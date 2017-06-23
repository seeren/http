<?php

/**
 * This file contain Seeren\Http\Response\ClientResponse class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.3
 */

namespace Seeren\Http\Response;

use Psr\Http\Message\StreamInterface;

/**
 * Class for represente http client response
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response
 */
class ClientResponse extends Response
{

   /**
    * Construct ClientResponse
    * 
    * @param StreamInterface $stream response stream
    * @return null
    */
   public function __construct(StreamInterface $stream)
   {
       parent::__construct($stream);
       $header = $this->body->getMetadata("wrapper_data");
       if (is_array($header)) {
           $response = explode(" ", $header[0]);
           array_shift($header);
           $this->protocol = $this->parseProtocol(substr($response[0], 5));
           $this->statusCode = (int) $response[1];
           array_shift($response);
           array_shift($response);
           $this->reasonPhrase = implode(" ", $response);
           foreach ($header as $value) {
               $header = explode(": ", $value);
               $this->header[
                   $this->parseHeaderName($header[0])
               ] = $this->parseHeaderValue($header[1]);
           }
       }
   }

}
