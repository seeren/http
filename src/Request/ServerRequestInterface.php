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

namespace Seeren\Http\Request;

/**
 * Interface for represent http server request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface ServerRequestInterface extends RequestInterface
{

   const

       /**
        * @var string
        */

       SERVER_PROTOCOL = "SERVER_PROTOCOL",

       /**
        * @var string
        */
       SERVER_METHOD = "REQUEST_METHOD";

}
