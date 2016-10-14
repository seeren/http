<?php

/**
 * This file contain Seeren\Http\Uri\Uri class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Http\Uri;

/**
 * Class for represent uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
class Uri extends AbstractUri implements UriInterface
{

    /**
     * Construct Uri
     * 
     * @param string $scheme uri scheme
     * @param string $host uri host
     * @param string $path uri path
     * @param string $query uri query
     * @param string $user uri user
     * @param int $port uri port
     * @param string $fragment uri fragment
     * @return null
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
