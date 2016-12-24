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
 * @version 1.1.3
 */

namespace Seeren\Http\Request;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface for represent http client request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface ClientRequestInterface extends RequestInterface
{


    /**
     * Get response
     *
     * @return ResponseInterface response
     */
    public function getResponse(): ResponseInterface;

    /**
     * Send request
     * 
     * @return ClientRequestInterface static
     * 
     * @throws RuntimeException on unavailable target for context
     */
   public function send(): self;

}
