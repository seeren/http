<?php

/**
 * This file contain Seeren\Http\Uri\UriInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Http\Uri;

use Psr\Http\Message\UriInterface;

/**
 * Interface for represent an uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
interface UriInterface extends UriInterface
{

   const
       /**
        * @var string non secure scheme
        */
       SCHEME_HTTP = "http",
       /**
        * @var string secure scheme
        */
       SCHEME_HTTPS = "https",
       /**
        * @var string scheme separator
        */
       SCHEME_SEPARATOR = "://",
       /**
        * @var string separator
        */
       SEPARATOR = "/",
       /**
        * @var string host separator
        */
       HOST_SEPARATOR = ":",
       /**
        * @var string user separator
        */
       USER_SEPARATOR = "@",
       /**
        * @var string path separator
        */
       PATH_SEPARATOR = "?",
       /**
        * @var string query separator
        */
       QUERY_SEPARATOR = "#";

}
