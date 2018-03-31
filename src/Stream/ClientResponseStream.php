<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.4
 */

namespace Seeren\Http\Stream;

use Psr\Http\Message\RequestInterface;
use InvalidArgumentException;
use RuntimeException;

/**
 * Class for represent client response stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream
 */
class ClientResponseStream extends Stream
{

   /**
    * Construct ClientRequestStream
    * 
    * @param RequestInterface $request request
    * @return null
    * 
    * @throws RuntimeException on faillure
    */
   public function __construct(RequestInterface $request)
   {
       try {
           parent::__construct(
               $request->getUri()->__toString(),
               self::MODE_R,
               stream_context_create($this->parseContext($request)));
       } catch (InvalidArgumentException $e) {
           throw new InvalidArgumentException(
               "Can't create client response stream: " . $e->getMessage());
       }
   }

   /**
    * Parse context
    * 
    * @param RequestInterface $request
    * @return array parsed context
    */
   private final function parseContext(RequestInterface $request): array
   {
       try {
           $header = "";
           foreach ($request->getHeaders() as $key => $value) {
               $header .= $key . ": " . implode("; ", $value) . "\r\n";
           }
           $request->getBody()->rewind();
       } catch (RuntimeException $e) {
       }
       return [
           "http" => [
               "method"  => $request->getMethod(),
               "header" => $header,
               "ignore_errors" => true,
               "content" => $request->getBody()->__toString()]
       ];
   }

}
