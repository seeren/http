<?php

/**
 * This file contain Seeren\Http\Response\ResponseInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.2.2
 */

namespace Seeren\Http\Response;

use Seeren\Http\Message\MessageInterface;

/**
 * Interface for represent http response
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response
 */
interface ResponseInterface extends MessageInterface
{

   const
       /**
        * @var string reason phrase
        */
       STATUS_100 = "Continue",
       /**
        * @var string reason phrase
        */
       STATUS_101 = "Switching Protocols",
       /**
        * @var string reason phrase
        */
       STATUS_200 = "OK",
       /**
        * @var string reason phrase
        */
       STATUS_201 = "Created",
       /**
        * @var string reason phrase
        */
       STATUS_202 = "Accepted",
       /**
        * @var string reason phrase
        */
       STATUS_203 = "Non-Authoritative Information",
       /**
        * @var string reason phrase
        */
       STATUS_204 = "No Content",
       /**
        * @var string reason phrase
        */
       STATUS_205 = "Reset Content",
       /**
        * @var string reason phrase
        */
       STATUS_206 = "Partial Content",
       /**
        * @var string reason phrase
        */
       STATUS_300 = "Multiple Choices",
       /**
        * @var string reason phrase
        */
       STATUS_301 = "Moved Permanently",
       /**
        * @var string reason phrase
        */
       STATUS_302 = "Moved Temporarily",
       /**
        * @var string reason phrase
        */
       STATUS_303 = "See Other",
       /**
        * @var string reason phrase
        */
       STATUS_304 = "Not Modified",
       /**
        * @var string reason phrase
        */
       STATUS_400  = "Bad Request",
       /**
        * @var string reason phrase
        */
       STATUS_401 = "Unauthorized",
       /**
        * @var string reason phrase
        */
       STATUS_402 = " Payment Required",
       /**
        * @var string reason phrase
        */
       STATUS_403 = "Forbidden",
       /**
        * @var string reason phrase
        */
       STATUS_404 = "Not Found",
       /**
        * @var string reason phrase
        */
       STATUS_405 = "Method Not Allowed",
       /**
        * @var string reason phrase
        */
       STATUS_406 = "Not Acceptable",
       /**
        * @var string reason phrase
        */
       STATUS_407 = "Proxy Authentication Required",
       /**
        * @var string reason phrase
        */
       STATUS_408 = "Request Timeout",
       /**
        * @var string reason phrase
        */
       STATUS_409 = "Conflict",
       /**
        * @var string reason phrase
        */
       STATUS_410 = "Gone",
       /**
        * @var string reason phrase
        */
       STATUS_411 = "Length Required",
       /**
        * @var string reason phrase
        */
       STATUS_412 = "Precondition Failed",
       /**
        * @var string reason phrase
        */
       STATUS_413 = "Payload Too Large",
       /**
        * @var string reason phrase
        */
       STATUS_414 = "Request-URI Too Long",
       /**
        * @var string reason phrase
        */
       STATUS_415 = "Unsupported Media Type",
       /**
        * @var string reason phrase
        */
       STATUS_416 = "Requested Range Not Satisfiable",
       /**
        * @var string reason phrase
        */
       STATUS_417 = "Expectation Failed",
       /**
        * @var string reason phrase
        */
       STATUS_500 = "Internal Server Error",
       /**
        * @var string reason phrase
        */
       STATUS_501 = "Not Implemented",
       /**
        * @var string reason phrase
        */
       STATUS_502 = "Bad Gateway",
       /**
        * @var string reason phrase
        */
       STATUS_503 = "Service Unavailable",
       /**
        * @var string reason phrase
        */
       STATUS_504 = "Gateway Timeout",
       /**
        * @var string reason phrase
        */
       STATUS_505 = "HTTP Version Not Supported",
       /**
        * @var string reason phrase
        */
       STATUS_506 = "Variant Also Negotiates",
       /**
        * @var string reason phrase
        */
       STATUS_507 = "Insufficient Storage",
       /**
        * @var string reason phrase
        */
       STATUS_508 = "Loop Detected",
       /**
        * @var string reason phrase
        */
       STATUS_509 = "Bandwidth Limit Exceeded",
       /**
        * @var string reason phrase
        */
       STATUS_510 = "Not Extended",
       /**
        * @var string reason phrase
        */
       STATUS_520 = "Web server is returning an unknown error";

}
