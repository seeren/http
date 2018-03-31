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
 * @version 1.1.2
 */

namespace Seeren\Http\Uri;

use Psr\Http\Message\UriInterface as PsrUriInterface;

/**
 * Class for represent uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
class Uri extends AbstractUri implements PsrUriInterface, UriInterface
{

    /**
     * @param string $scheme
     * @param string $host
     * @param string $path
     * @param string $query
     * @param string $user
     * @param int $port
     * @param string $fragment
     */
    public function __construct(
        string $scheme,
        string $host,
        string $path = "",
        string $query = "",
        string  $user = "",
        int $port = 0,
        string $fragment = "")
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
