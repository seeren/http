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
 * @version 1.1.0
 */

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\RequestInterface;
use Seeren\Http\Request\Request;
use Seeren\Http\Stream\ServerRequestStream;
use Seeren\Http\Uri\ServerRequestUri;
use ReflectionClass;

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
        return (new ReflectionClass(Request::class))
               ->newInstanceArgs([
                    (new ReflectionClass(ServerRequestStream::class))
                    ->newInstanceArgs([]),
                    (new ReflectionClass(ServerRequestUri::class))
                    ->newInstanceArgs([])
               ]
        );
    }

}
