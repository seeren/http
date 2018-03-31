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
     * @var string
     */
    PROTOCOL = "HTTP/",

    /**
     * @var string
     */
    VERSION_0 = "1.0",

    /**
     * @var string
     */
    VERSION_1 = "1.1",

    /**
     * @var string
     */
    HEADER_CACHE_CONTROL = "Cache-Control",

    /**
     * @var string
     */
    HEADER_COOKIE = "Cookie",

    /**
     * @var string
     */
    HEADER_CONTENT_LENGTH = "Content-Length",

    /**
     * @var string
     */
    HEADER_CONTENT_SECURITY_POLICY = "Content-Security-Policy",

    /**
     * @var string
     */
    HEADER_CONTENT_TYPE = "Content-Type",

    /**
     * @var string
     */
    HEADER_DATE = "Date";

}
