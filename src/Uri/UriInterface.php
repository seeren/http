<?php

namespace Seeren\Http\Uri;

/**
 * Interface to represent a URI
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Uri
 */
interface UriInterface extends \Psr\Http\Message\UriInterface
{

    /**
     * @var string
     */
    const SCHEME_HTTP = 'http';

    /**
     * @var string
     */
    const SCHEME_HTTPS = 'https';

    /**
     * @var string
     */
    const SCHEME_SEPARATOR = '://';

    /**
     * @var string
     */
    const SEPARATOR = '/';

    /**
     * @var string
     */
    const HOST_SEPARATOR = ':';

    /**
     * @var string
     */
    const USER_SEPARATOR = '@';

    /**
     * @var string
     */
    const PATH_SEPARATOR = '?';

    /**
     * @var string
     */
    const QUERY_SEPARATOR = '#';

}
