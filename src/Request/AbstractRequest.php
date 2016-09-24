<?php

/**
 * This file contain Seeren\Http\Request\AbstractRequest class
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
use Psr\Http\Message\RequestInterface;
use Seeren\Http\Message\AbstractMessage;
use InvalidArgumentException;

/**
 * Class for represent http request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 * @abstract
 */
abstract class AbstractRequest extends AbstractMessage
{

   protected
       /**
        * @var string method
       */
       $method,
       /**
        * @var UriInterface uri
        */
       $uri;

   /**
    * Construct AbstractRequest
    * 
    * @param StreamInterface $stream message body
    * @param UriInterface $uri request uri
    * @param string $method method
    * @param string $protocol message protocol
    * @param array $header message header
    * @return null
    */
   protected function __construct(
       StreamInterface $stream,
       UriInterface $uri,
       string $method = "GET",
       string $protocol = "1.1",
       array $header = [])
   {
       parent::__construct($protocol, $header, $stream);
       $this->method = $this->parseMethod($method);
       $this->uri = $uri;
   }

   /**
    * Parse method
    *
    * @param string $method method
    * @return string method
    */
   private final function parseMethod(string $method): string
   {
       return static::GET === $method
           || static::POST === $method
           || static::PUT === $method
           || static::DELETE === $method
            ? $method : static::GET;
   }

   /**
    * Get request target
    *
    * @return string request target
    */
   public final function getRequestTarget(): string
   {
       return $this->uri->getPath() ? $this->uri->getPath() : "/";
   }
    
   /**
    * Get an instance for request target
    *
    * @param mixed $requestTarget
    * @return MessageInterface for request target
    */
   public final function withRequestTarget($requestTarget): RequestInterface
   {
       return $this->with(
           "uri",
           $this->uri->withPath((string) $requestTarget));
   }
    
   /**
    * Get method
    *
    * @return string method
    */
   public final function getMethod(): string
   {
       return $this->method;
   }
    
   /**
    * Get an instance for method
    * 
    * @param string $method case-sensitive
    * @return MessageInterface for method
    * 
    * @throws InvalidArgumentException
    */
   public final function withMethod($method): RequestInterface
   {
       if (!is_string($method)
        || !($toUpperMethod = strtoupper((string) $method))
        || $toUpperMethod !== $this->parseMethod($method)) {
           throw new InvalidArgumentException(
               "Can't get instance for method: " . $method . " not supported");
       }
       return $this->with("method", $toUpperMethod);
   }

   /**
    * Get uri
    *
    * @return UriInterface request uri
    */
   public final function getUri(): UriInterface
   {
       return $this->uri;
   }

   /**
    * Get an instance for uri
    *
    * @param UriInterface $uri new request uri
    * @param bool $preserveHost preserve host header
    * @return MessageInterface for uri
    */
   public final function withUri(
       UriInterface $uri,
       $preserveHost = false): RequestInterface
   {
       if (true === $preserveHost
        && !array_key_exists("Host", $this->header)
        && $uri->getHost()) {
           return ($this->with("uri", $uri))
                        ->withHeader("Host", $uri->getHost());
       }
       return $this->with("uri", $uri);
   }

}
