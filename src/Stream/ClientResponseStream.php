<?php

/**
 * This file contain Seeren\Http\Stream\ClientResponseStream class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Http\Stream;

use RuntimeException;
use Psr\Http\Message\RequestInterface;
use Seeren\Http\Request\ClientRequestInterface;

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
    * @param ClientRequestInterface $request client request
    * @return null
    * 
    * @throws RuntimeException on faillure
    */
   public function __construct(ClientRequestInterface $request)
   {
       try {
           parent::__construct(
               $request->getUri()->__toString(),
               self::MODE_R,
               stream_context_create($this->parseContext($request)));
       } catch (RuntimeException $e) {
           throw new RuntimeException(
               "Can't create ClientResponseStream: " . $e->getMessage());
       }
   }

   protected function parseContext(RequestInterface $request): array
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
