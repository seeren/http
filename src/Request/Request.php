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
 * @version 1.1.2
 */

namespace Seeren\Http\Request;

use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class for represent http request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
class Request extends AbstractRequest implements
    PsrRequestInterface,
    RequestInterface
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
