<?php

/**
 * This file contain Seeren\Http\Test\Request\ServerRequestTest class
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

use Psr\Http\Message\ServerRequestInterface;
use Seeren\Http\Request\ServerRequest;
use Seeren\Http\Stream\ServerRequestStream;
use Seeren\Http\Uri\ServerRequestUri;

/**
 * Class for test ServerRequest
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request\Test
 */
class ServerRequestTest extends ServerRequestInterfaceTest
{

    /**
     * Get ServerRequestInterface
     *
     * @return ServerRequestInterface request
     */
    protected function getServerRequest(): ServerRequestInterface
    {
        return $this->getMock(
            ServerRequest::class,
            [],
            [$this->getMock(ServerRequestStream::class),
             $this->getMock(ServerRequestUri::class)]);
    }

}
