<?php

/**
 * This file contain Seeren\Http\Request\Request class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Http\Request;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class for represent http request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
class Request extends AbstractRequest implements RequestInterface
{

   /**
    * Construct Request
    * 
    * @param StreamInterface $stream message body
    * @param UriInterface $uri request uri
    * @param string $method method
    * @param string $protocol message protocol
    * @param array $header message header
    * @return null
    */
   public function __construct(
       StreamInterface $stream,
       UriInterface $uri,
       string $method = "GET",
       string $protocol = "1.1",
       array $header = [])
   {
       parent::__construct($stream, $uri, $method, $protocol, $header);
   }

}
