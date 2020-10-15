<?php

namespace Seeren\Http\Uri;

use InvalidArgumentException;

/**
 * Class to represent a URI
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Uri
 */
class Uri extends AbstractUri
{

    /**
     * @param string $scheme
     * @param string $host
     * @param string $path
     * @param string $query
     * @param string $user
     * @param int|null $port
     * @param string $fragment
     *
     * @throws InvalidArgumentException
     */
    public function __construct(
        string $scheme,
        string $host,
        string $path = '',
        string $query = '',
        string $user = '',
        int $port = null,
        string $fragment = '')
    {
        parent::__construct(
            $scheme,
            $user,
            $host,
            $port,
            $path,
            $query,
            $fragment);
    }

}
