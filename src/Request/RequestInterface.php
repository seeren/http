<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
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
     * @var string
     */
    GET = "GET",

    /**
     * @var string
     */
    POST = "POST",

    /**
     * @var string
     */
    PUT = "PUT",

    /**
     * @var string
     */
    DELETE = "DELETE",

    /**
     * @var string
     */
    OPTIONS = "OPTIONS",

    /**
     * @var string
     */
    HEADER_ACCEPT = "Accept",

    /**
     * @var string
     */
    HEADER_EXPECT = "Expect",

    /**
     * @var string
     */
    HEADER_FROM = "From",

    /**
     * @var string
     */
    HEADER_HOST = "Host",

    /**
     * @var string
     */
    HEADER_IF_MATCH = "If-Match",

    /**
     * @var string
     */
    HEADER_IF_MODIFIED_SINCE = "If-Modified-Since",

    /**
     * @var string
     */
    HEADER_IF_NOT_MATCH = "If-None-Match",

    /**
     * @var string
     */
    HEADER_IF_RANGE = "If-Range",

    /**
     * @var string
     */
    HEADER_IF_UNMODIFIED_SINCE = "If-Unmodified-Since",

    /**
     * @var string
     */
    HEADER_MAX_FORWARDS = "Max-Forwards",

    /**
     * @var string
     */
    HEADER_ORIGIN = "Origin",

    /**
     * @var string
     */
    HEADER_PROXY_AUTHORIZATION = "Proxy-Authorization",

    /**
     * @var string
     */
    HEADER_RANGE = "Range",

    /**
     * @var string
     */
    HEADER_REFERER = "Referer",

    /**
     * @var string
     */
    HEADER_USER_AGENT = "User-Agent";
}
