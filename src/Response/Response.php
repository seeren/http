<?php

/**
 * This file contain Seeren\Http\Response\Response class
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

namespace Seeren\Http\Response;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Message\AbstractMessage;
use InvalidArgumentException;

/**
 * Class for represente http response
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response
 */
class Response extends AbstractMessage implements ResponseInterface
{

   protected
       /**
        * @var int status code
        */
       $statusCode,
       /**
        * @var string reason phrase
        */
       $reasonPhrase;

   /**
    * Construct Response
    * 
    * @param StreamInterface $stream response stream
    * @param string $version protocol version
    * @return null
    */
   public function __construct(StreamInterface $stream, $version = "1.1")
   {
       parent::__construct((string) $version, [], $stream);
       $this->setStatus(200);
   }

   /**
    * Set status
    *
    * @param int $code status code
    * @return null
    *
    * @throws InvalidArgumentException
    */
   public final function setStatus(int $code)
   {
       $const = "self::STATUS_" . $code;
       if (!defined($const)) {
           throw new InvalidArgumentException(
               "Can't set status for code: " . $code);
       }
       $this->statusCode = $code;
       $this->reasonPhrase = constant($const);
   }

   /**
    * Set header
    *
    * @param string $name header case-insensitive name
    * @param string|array $value header value
    * @return null
    *
    * @throws InvalidArgumentException
    */
   public final function setHeader(string $name, $value)
   {
       $parsedValue = $this->parseHeaderValue($value);
       if ([] === $parsedValue) {
           throw new InvalidArgumentException(
               "Can't set header: invalid " . $name);
       }
       $this->header[$this->parseHeaderName($name)] = $parsedValue;
   }

   /**
    * Remove header
    *
    * @param string $name header case-insensitive name
    * @return null
    *
    * @throws InvalidArgumentException
    */
   public final function removeHeader(string $name): bool
   {
       $parsedName = $this->parseHeaderName($name);
       if (array_key_exists($parsedName, $this->header)) {
           unset($this->header[$parsedName]);
           return true;
       }
       return false;
   }

   /**
    * Get status code
    *
    * @return int status code
    */
   public final function getStatusCode()
   {
       return $this->statusCode;
   }

   /**
    * Return an instance for the specified status code
    *
    * @param int $code status code
    * @param string $reasonPhrase reason phrase
    * @return ResponseInterface
    * 
    * @throws InvalidArgumentException
    */
   public final function withStatus(
       $code,
       $reasonPhrase = ""): ResponseInterface
   {
       try {
           $response = $this->with("statusCode", $code);
           $response->setStatus($code);
       } catch (InvalidArgumentException $e) {
           throw new InvalidArgumentException(
               "Can't get instance for status: " . $e->getMessage());
       }
       return $response;
   }

   /**
    * Get reason phrase 
    *
    * @return string reason phrase
    */
   public final function getReasonPhrase(): string
   {
       return $this->reasonPhrase;
   }

}
