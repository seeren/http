<?php

/**
 * This file contain Seeren\Http\Uri\ServerRequestUriInterface interface
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
 * Interface for represent server request uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
interface ServerRequestUriInterface extends UriInterface
{

   const
       /**
        * @var string server index
        */
       SERVER_SCHEME = "REQUEST_SCHEME",
       /**
        * @var string server index
        */
       SERVER_USER = "REMOTE_USER",
       /**
        * @var string server index
        */
       SERVER_REDIRECT_USER = "REDIRECT_REMOTE_USER",
       /**
        * @var string server index
        */
       SERVER_HOST = "SERVER_NAME",
       /**
        * @var string server index
        */
       SERVER_PORT = "SERVER_PORT",
       /**
        * @var string server index
        */
       SERVER_PATH = "SCRIPT_NAME",
       /**
        * @var string server index
        */
       SERVER_QUERY = "QUERY_STRING",
       /**
        * @var string server index
        */
       SERVER_REDIRECT_URL = "REDIRECT_URL",
       /**
        * @var string server index
        */
       SERVER_REQUEST_URI = "REQUEST_URI";

}
