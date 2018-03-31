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
 * @version 1.2.2
 */

namespace Seeren\Http\Response;

use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
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
class Response extends AbstractMessage implements
    PsrResponseInterface,
    ResponseInterface
{

   protected

       /**
        * @var int
        */
       $statusCode,

       /**
        * @var string
        */
       $reasonPhrase;

   /**
    * @param StreamInterface $stream response stream
    * @param string $version protocol version
    */
   public function __construct(StreamInterface $stream, $version = "1.1")
   {
       parent::__construct((string) $version, [], $stream);
       $this->setStatus(200);
   }

   /**
    * @param int $code status code
    * @throws InvalidArgumentException
    */
   protected final function setStatus(int $code)
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
    * {@inheritDoc}
    * @see \Psr\Http\Message\ResponseInterface::getStatusCode()
    */
   public final function getStatusCode()
   {
       return $this->statusCode;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ResponseInterface::withStatus()
    */
   public final function withStatus(
       $code,
       $reasonPhrase = ""): ResponseInterface
   {
       try {
           $response = $this->with("statusCode", $code);
           $response->setStatus((int) $code, $reasonPhrase);
       } catch (InvalidArgumentException $e) {
           throw new InvalidArgumentException(
               "Can't get instance for status: " . $e->getMessage());
       }
       return $response;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ResponseInterface::getReasonPhrase()
    */
   public final function getReasonPhrase(): string
   {
       return $this->reasonPhrase;
   }

}
