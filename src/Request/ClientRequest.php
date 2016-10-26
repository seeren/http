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
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.2
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
    * Send request
    *
    * @return ClientRequestInterface static
    *
    * @throws RuntimeException on faillure
    */
   public final function send(): ClientRequestInterface
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

   /**
    * Get response
    *
    * @return ResponseInterface response
    * 
    * @throws RuntimeException for not sent request
    */
   public final function getResponse(): ResponseInterface
   {
       if (!$this->response) {
           throw new RuntimeException(
               "Can't get response: request must be send");
       }
       return $this->response;
   }

}
