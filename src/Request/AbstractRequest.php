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
 * @version 1.0.3
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
        * @var string
        */
       $method,

       /**
        * @var UriInterface
        */
       $uri;

   /**
    * @param StreamInterface $stream message body
    * @param UriInterface $uri request uri
    * @param string $method method
    * @param string $protocol message protocol
    * @param array $header message header
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
           || static::OPTIONS === $method
            ? $method
            : static::GET;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\RequestInterface::getRequestTarget()
    */
   public final function getRequestTarget(): string
   {
       return $this->uri->getPath() ? $this->uri->getPath() : "/";
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\RequestInterface::withRequestTarget()
    */
   public final function withRequestTarget($requestTarget): RequestInterface
   {
       return $this->with(
           "uri",
           $this->uri->withPath((string) $requestTarget));
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\RequestInterface::getMethod()
    */
   public final function getMethod(): string
   {
       return $this->method;
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\RequestInterface::withMethod()
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
    * {@inheritDoc}
    * @see \Psr\Http\Message\RequestInterface::getUri()
    */
   public final function getUri(): UriInterface
   {
       return $this->uri;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\RequestInterface::withUri()
    */
   public final function withUri(
       UriInterface $uri,
       $preserveHost = false): RequestInterface
   {
       if (true === $preserveHost
        && !array_key_exists("Host", $this->header)
        && $uri->getHost()) {
           return $this->with("uri", $uri)->withHeader("Host", $uri->getHost());
       }
       return $this->with("uri", $uri);
   }

}
