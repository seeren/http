<?php

/**
 * This file contain Seeren\Http\Test\Request\RequestTest class
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

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\RequestInterface;
use Seeren\Http\Request\ServerRequest;
use Seeren\Http\Stream\ServerRequestStream;
use Seeren\Http\Uri\ServerRequestUri;

/**
 * Class for test Request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request\Test
 */
class RequestTest extends RequestInterfaceTest
{

    /**
     * Get RequestInterface
     *
     * @return RequestInterface request
     */
    protected function getRequest(): RequestInterface
    {
        return $this->getMock(
            ServerRequest::class,
            [],
            [$this->getMock(ServerRequestStream::class),
             $this->getMock(ServerRequestUri::class)]);
    }

}
