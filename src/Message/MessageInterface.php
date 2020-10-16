<?php

namespace Seeren\Http\Message;

/**
 * Interface to represent a generic message
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Message
 */
interface MessageInterface
{

    /**
     * @var string
     */
    const PROTOCOL = 'HTTP/';

    /**
     * @var string
     */
    const VERSION_0 = '1.0';

    /**
     * @var string
     */
    const VERSION_1 = '1.1';

    /**
     * @var string
     */
    const VERSION_2 = '2';

    /**
     * @var string
     */
    const HEADER_CACHE_CONTROL = 'Cache-Control';

    /**
     * @var string
     */
    const HEADER_COOKIE = 'Cookie';

    /**
     * @var string
     */
    const HEADER_CONTENT_LENGTH = 'Content-Length';

    /**
     * @var string
     */
    const HEADER_CONTENT_SECURITY_POLICY = 'Content-Security-Policy';

    /**
     * @var string
     */
    const HEADER_CONTENT_TYPE = 'Content-Type';

    /**
     * @var string
     */
    const HEADER_DATE = 'Date';

}
