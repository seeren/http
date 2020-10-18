<?php

namespace Seeren\Http\Request;

/**
 * Interface to represent a server request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Request
 */
interface ServerRequestInterface extends RequestInterface, \Psr\Http\Message\ServerRequestInterface
{

    /**
     * @var string
     */
    const SERVER_PROTOCOL = 'SERVER_PROTOCOL';

    /**
     * @var string
     */
    const SERVER_METHOD = 'REQUEST_METHOD';

}
