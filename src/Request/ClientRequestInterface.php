<?php

/**
 * This file contain Seeren\Http\Request\ClientRequestInterface interface
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

namespace Seeren\Http\Request;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;

/**
 * Interface for represent http client request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface ClientRequestInterface extends RequestInterface, PsrRequestInterface
{

    /**
     * Send request
     * 
     * @return ClientRequestInterface static
     * 
     * @throws RuntimeException on faillure
     */
   public function send(): self;

   /**
    * Get response
    * 
    * @return ResponseInterface response
    * 
    * @throws RuntimeException for not sent request
    */
   public function getResponse(): ResponseInterface;

}
