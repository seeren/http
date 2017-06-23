<?php

/**
 * This file contain Seeren\Http\Request\RequestInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.1.4
 */

namespace Seeren\Http\Request;

use Seeren\Http\Message\MessageInterface;

/**
 * Interface for represent http request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface RequestInterface extends MessageInterface
{

   const
       /**
        * @var string method name
        */
       GET                        = "GET",
       /**
        * @var string method name
        */
       POST                       = "POST",
       /**
        * @var string method name
        */
       PUT                        = "PUT",
       /**
        * @var string method name
        */
       DELETE                     = "DELETE",
       /**
        * @var string header value
        */
       HEADER_ACCEPT              = "Accept",
       /**
        * @var string header value
        */
       HEADER_EXPECT              = "Expect",
       /**
        * @var string header value
        */
       HEADER_FROM                = "From",
       /**
        * @var string header value
        */
       HEADER_HOST                = "Host",
       /**
        * @var string header value
        */
       HEADER_IF_MATCH            = "If-Match",
       /**
        * @var string header value
        */
       HEADER_IF_MODIFIED_SINCE   = "If-Modified-Since",
       /**
        * @var string header value
        */
       HEADER_IF_NOT_MATCH        = "If-None-Match",
       /**
        * @var string header value
        */
       HEADER_IF_RANGE            = "If-Range",
       /**
        * @var string header value
        */
       HEADER_IF_UNMODIFIED_SINCE = "If-Unmodified-Since",
       /**
        * @var string header value
        */
       HEADER_MAX_FORWARDS        = "Max-Forwards",
       /**
        * @var string header value
        */
       HEADER_ORIGIN              = "Origin",
       /**
        * @var string header value
        */
       HEADER_PROXY_AUTHORIZATION = "Proxy-Authorization",
       /**
        * @var string header value
        */
       HEADER_RANGE               = "Range",
       /**
        * @var string header value
        */
       HEADER_REFERER             = "Referer",
       /**
        * @var string header value
        */
       HEADER_USER_AGENT          = "User-Agent";

}
