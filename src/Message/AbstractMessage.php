<?php

/**
 * This file contain Seeren\Http\Response\AbstractMessage class
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

namespace Seeren\Http\Message;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\MessageInterface;
use InvalidArgumentException;

/**
 * Class for represent http message
 * 
 * @category Seeren
 * @package Http
 * @subpackage Message
 * @abstract
 */
abstract class AbstractMessage
{

   protected
       /**
        * @var string message protocol
        */
       $protocol,
       /**
        * @var array message header
        */
       $header,
       /**
        * @var StreamInterface message body
        */
       $body;

   /**
    * Construct AbstractMessage
    * 
    * @param string $version message protocol version
    * @param array $header message header collection
    * @param StreamInterface $stream message body
    * @return null
    */
   protected function __construct(
       string $version,
       array $header,
       StreamInterface $stream)
   {
       $this->protocol = $this->parseProtocol($version);
       $this->header = $header;
       $this->body = $stream;
   }

   /**
    * Parse protocol
    *
    * @param string $version protocol version
    * @return string protocol
    */
   protected final function parseProtocol($version): string
   {
       return static::PROTOCOL
            . ($version == static::VERSION_0
            ? static::VERSION_0
            : static::VERSION_1);
   }

   /**
    * Get self with
    *
    * @param string $name attribute name
    * @param mixed $value attribute value
    *
    * @return MessageInterface self with
    */
   protected final function with(string $name, $value): MessageInterface
   {
       $clone = clone $this;
       $clone->{$name} = $value;
       return $clone;
   }

   /**
    * Parse header name
    *
    * @param string $name header case-insensitive name
    * @return string header name
    */
   protected final function parseHeaderName(string $name): string
   {
       $key = [];
       foreach (explode("-", $name) as $name) {
           $key[] = ucfirst(strtolower($name));
       }
       return implode("-", $key);
    }

    /**
     * Parse header value
     *
     * @param string|array $value header value
     * @return array header value
     */
    protected final function parseHeaderValue($value): array
    {
        $header = [];
        if (is_string($value) && "" !== $value) {
            foreach (explode(";", $value) as $value) {
                $header[] = trim($value);
            }
        } else if (is_array($value)) {
            foreach ($value as $value) {
                $header[] = $value;
            }
        }
        return $header;
    }

   /**
    * Get HTTP protocol
    *
    * @return string HTTP protocol version
    */
   public final function getProtocolVersion(): string
   {
       return str_replace(static::PROTOCOL, "", $this->protocol);
   }

   /**
    * Get an instance for protocol version
    *
    * @param string $version protocol version
    * @return MessageInterface for protocol version
    */
   public final function withProtocolVersion($version): MessageInterface
   {
       return $this->with("protocol", $this->parseProtocol($version));
   }

    /**
     * Get all headers
     *
     * @return array header collection
     */
    public final function getHeaders(): array
    {
        return $this->header;
    }

   /**
    * Has header
    *
    * @param string $name header case-insensitive name
    * @return bool match or not
    */
   public final function hasHeader($name): bool
   {
       return array_key_exists($this->parseHeaderName($name), $this->header);
   }

   /**
    * Get header
    *
    * @param string $name header case-insensitive name
    * @return array of string values
    */
   public final function getHeader($name): array
   {
       $key = $this->parseHeaderName($name);
       return array_key_exists($key, $this->header) ? $this->header[$key] : [];
   }

   /**
    * Get header line
    *
    * @param string $name header case-insensitive name
    * @return string header line
    */
   public final function getHeaderLine($name): string
   {
       $key = $this->parseHeaderName($name);
       return array_key_exists($key, $this->header)
            ? implode(",", $this->header[$key])
            : "";
   }

   /**
    * Get an instance for header name and value
    *
    * @param string $name header case-insensitive name
    * @param string|array $value header value
    * @return MessageInterface for header name and value
    * 
    * @throws InvalidArgumentException
    */
   public final function withHeader($name, $value): MessageInterface
   {
       $value = $this->parseHeaderValue($value);
       if (!is_string($name) || [] === $value) {
           throw new InvalidArgumentException(
               "Can't get instance for header: invalid " . $name);
       }
       $header = $this->header;
       $header[$this->parseHeaderName($name)] = $value;
       return $this->with("header", $header);
   }

   /**
    * Get an instance for header name and value added
    *
    * @param string $name header case-insensitive name
    * @param string|array $value header value
    * @return MessageInterface for header name and value added
    * 
    * @throws InvalidArgumentException
    */
   public final function withAddedHeader($name, $value): MessageInterface
   {
       $key = $this->parseHeaderName($name);
       $header = $this->header;
       if (!array_key_exists($key, $header)) {
           $value = $this->parseHeaderValue($value);
           if ("" === $key || [] === $value) {
               throw new InvalidArgumentException(
                   "Can't get instance for added header: invalid " . $name);
           }
           $header[$key] = $value;
       }
       return $this->with("header", $header);
   }

   /**
    * Get an instance without header
    *
    * @param string $name header case-insensitive name
    * @return MessageInterface for header name removed
    */
   public final function withoutHeader($name): MessageInterface
   {
       $key = $this->parseHeaderName($name);
       $header = $this->header;
       if (array_key_exists($key, $header)) {
           unset($header[$key]);
       }
       return $this->with("header", $header);
   }

   /**
    * Get body
    *
    * @return StreamInterface body
    */
   public final function getBody(): StreamInterface
   {
       return $this->body;
   }

   /**
    * Get an instance for body
    * 
    * @param StreamInterface $body Body
    * @return MessageInterface for body
    * 
    * @throws InvalidArgumentException
    */
   public final function withBody(StreamInterface $body): MessageInterface
   {
       if (!$body->getMetadata("uri")) {
           throw new InvalidArgumentException(
               "Can't get instance for body: invalid stream");
       }
       return $this->with("body", $body);
   }

}
