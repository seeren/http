<?php

/**
 * This file contain Seeren\Http\Message\MessageInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.2
 */

namespace Seeren\Http\Message;

/**
 * Interface for represent http message
 * 
 * @category Seeren
 * @package Http
 * @subpackage Message
 */
interface MessageInterface
{

   const
       /**
        * @var string protocol
        */
       PROTOCOL                       = "HTTP/",
       /**
        * @var string protocol version 0
        */
       VERSION_0                      = "1.0",
       /**
        * @var string protocol version 1
        */
       VERSION_1                      = "1.1",
       /**
        * @var string header value
        */
       HEADER_CACHE_CONTROL           = "Cache-Control",
       /**
        * @var string header value
        */
       HEADER_COOKIE                  = "Cookie",
       /**
        * @var string header value
        */
       HEADER_CONTENT_LENGTH          = "Content-Length",
       /**
        * @var string header value
        */
       HEADER_CONTENT_SECURITY_POLICY = "Content-Security-Policy",
       /**
        * @var string header value
        */
       HEADER_CONTENT_TYPE            = "Content-Type",
       /**
        * @var string header value
        */
       HEADER_DATE                    = "Date";

}
