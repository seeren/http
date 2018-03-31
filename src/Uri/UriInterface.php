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
 * @version 1.1.3
 */
namespace Seeren\Http\Uri;

/**
 * Interface for represent an uri
 *
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
interface UriInterface
{

    const

        /**
         * @var string
         */
        SCHEME_HTTP = "http",
    
        /**
         * @var string
         */
        SCHEME_HTTPS = "https",
    
        /**
         * @var string
         */
        SCHEME_SEPARATOR = "://",
    
        /**
         * @var string
         */
        SEPARATOR = "/", 
    
        /**
         * @var string
         */
        HOST_SEPARATOR = ":", 
    
        /**
         * @var string
         */
        USER_SEPARATOR = "@", 
    
        /**
         * @var string
         */
        PATH_SEPARATOR = "?", 
    
        /**
         * @var string
         */
        QUERY_SEPARATOR = "#";

}
