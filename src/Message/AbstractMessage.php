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
abstract class AbstractMessage implements  MessageInterface
{

   protected

       /**
        * @var string
        */
       $protocol,

       /**
        * @var array
        */
       $header,

       /**
        * @var StreamInterface
        */
       $body;

   /**
    * @param string $version
    * @param array $header
    * @param StreamInterface
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
    * @param string $version
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
    * @param string $name
    * @param mixed $value
    * @return MessageInterface
    */
   protected final function with(string $name, $value): MessageInterface
   {
       $clone = clone $this;
       $clone->{$name} = $value;
       return $clone;
   }

   /**
    * @param string $nam
    * @return string
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
     * @param string|array $value
     * @return array
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
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::getProtocolVersion()
    */
   public final function getProtocolVersion(): string
   {
       return str_replace(static::PROTOCOL, "", $this->protocol);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::withProtocolVersion()
    */
   public final function withProtocolVersion($version): MessageInterface
   {
       return $this->with("protocol", $this->parseProtocol($version));
   }

    /**
     * {@inheritDoc}
     * @see \Psr\Http\Message\MessageInterface::getHeaders()
     */
    public final function getHeaders(): array
    {
        return $this->header;
    }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::hasHeader()
    */
   public final function hasHeader($name): bool
   {
       return array_key_exists($this->parseHeaderName($name), $this->header);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::getHeader()
    */
   public final function getHeader($name): array
   {
       $key = $this->parseHeaderName($name);
       return array_key_exists($key, $this->header) ? $this->header[$key] : [];
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::getHeaderLine()
    */
   public final function getHeaderLine($name): string
   {
       $key = $this->parseHeaderName($name);
       return array_key_exists($key, $this->header)
            ? implode(",", $this->header[$key])
            : "";
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::withHeader()
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
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::withAddedHeader()
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
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::withoutHeader()
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
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::getBody()
    */
   public final function getBody(): StreamInterface
   {
       return $this->body;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\MessageInterface::withBody()
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
