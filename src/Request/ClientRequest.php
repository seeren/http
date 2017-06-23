<?php

/**
 * This file contain Seeren\Http\Request\ClientRequest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.1.3
 */

namespace Seeren\Http\Request;

use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\ClientResponseStream;
use Seeren\Http\Response\ClientResponse;
use RuntimeException;

/**
 * Class for represent http client request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
class ClientRequest extends AbstractRequest implements
    PsrRequestInterface,
    ClientRequestInterface
{

   protected
       /**
        * @var ResponseInterface response
        */
       $response;

   /**
    * Construct ClientRequest
    * 
    * @param string $method method
    * @param UriInterface $uri request uri
    * @param StreamInterface $stream message body
    * @param array $header message header
    * @return null
    */
   public function __construct(
       string $method,
       UriInterface $uri,
       StreamInterface $stream,
       array $header = [])
   {
       parent::__construct(
           $stream,
           $uri,
           $method,
           "1.1",
           $this->parseHeader($header));
   }

   /**
    * Parse header
    *
    * @param array $header headers
    * @return array headers
    */
   private final function parseHeader(array $header): array
   {
       $parsedHeader = [];
       foreach ($header as $key => $value) {
           $parsedHeader[
               $this->parseHeaderName($key)
           ] = $this->parseHeaderValue($value);
       }
       return $parsedHeader;
   }

   /**
    * Get response
    *
    * @return ResponseInterface response
    */
   public final function getResponse(): ResponseInterface
   {
       return $this->response;
   }

   /**
    * Send request
    *
    * @return ClientRequestInterface static
    *
    * @throws RuntimeException on unavailable target for context
    */
   public function send(): ClientRequestInterface
   {
       try {
           $this->response = new ClientResponse(
               new ClientResponseStream($this));
       } catch (RuntimeException $e) {
           throw new RuntimeException(
               "Can't send client request: " . $e->getMessage());
       }
       return $this;
   }

}
