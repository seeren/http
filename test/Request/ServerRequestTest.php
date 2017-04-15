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
 * @version 1.0.2
 */

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\ServerRequestInterface;
use Seeren\Http\Request\ServerRequest;
use Seeren\Http\Stream\ServerRequestStream;
use Seeren\Http\Uri\ServerRequestUri;
use ReflectionClass;

/**
 * Class for test ServerRequest
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request\Test
 */
class ServerRequestTest extends ServerRequestInterfaceTest
{

    private $serverRequest;
    
    /**
     * Get ServerRequestInterface
     *
     * @return ServerRequestInterface request
     */
    protected function getServerRequest(): ServerRequestInterface
    {
        if (!$this->serverRequest) {
            $this->serverRequest = (new ReflectionClass(ServerRequest::class))
              ->newInstanceArgs([
                    (new ReflectionClass(ServerRequestStream::class))
                    ->newInstanceArgs([]),
                    (new ReflectionClass(ServerRequestUri::class))
                    ->newInstanceArgs([]),
              ]
            );
        }
        return $this->serverRequest;
    }

}
