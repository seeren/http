<?php

namespace Seeren\Http\Request;

use Seeren\Http\Message\MessageInterface;

/**
 * Interface to represent a request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Request
 */
interface RequestInterface extends MessageInterface, \Psr\Http\Message\RequestInterface
{

    /**
     * @var string
     */
    const GET = 'GET';

    /**
     * @var string
     */
    const HEAD = 'HEAD';

    /**
     * @var string
     */
    const POST = 'POST';

    /**
     * @var string
     */
    const PUT = 'PUT';

    /**
     * @var string
     */
    const DELETE = 'DELETE';

    /**
     * @var string
     */
    const CONNECT = 'CONNECT';

    /**
     * @var string
     */
    const OPTIONS = 'OPTIONS';

    /**
     * @var string
     */
    const TRACE = 'TRACE';

    /**
     * @var string
     */
    const PATCH = 'PATCH';

    /**
     * @var string
     */
    const HEADER_ACCEPT = 'Accept';

    /**
     * @var string
     */
    const HEADER_EXPECT = 'Expect';

    /**
     * @var string
     */
    const HEADER_FROM = 'From';

    /**
     * @var string
     */
    const HEADER_HOST = 'Host';

    /**
     * @var string
     */
    const HEADER_IF_MATCH = 'If-Match';

    /**
     * @var string
     */
    const HEADER_IF_MODIFIED_SINCE = 'If-Modified-Since';

    /**
     * @var string
     */
    const HEADER_IF_NOT_MATCH = 'If-None-Match';

    /**
     * @var string
     */
    const HEADER_IF_RANGE = 'If-Range';

    /**
     * @var string
     */
    const HEADER_IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';

    /**
     * @var string
     */
    const HEADER_MAX_FORWARDS = 'Max-Forwards';

    /**
     * @var string
     */
    const HEADER_ORIGIN = 'Origin';

    /**
     * @var string
     */
    const HEADER_PROXY_AUTHORIZATION = 'Proxy-Authorization';

    /**
     * @var string
     */
    const HEADER_RANGE = 'Range';

    /**
     * @var string
     */
    const HEADER_REFERER = 'Referer';

    /**
     * @var string
     */
    const HEADER_USER_AGENT = 'User-Agent';

}
