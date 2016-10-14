<?php

/**
 * This file contain Seeren\Http\Request\ServerRequestInterface interface
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

namespace Seeren\Http\Request;

use Psr\Http\Message\ServerRequestInterface as PsrServerRequestInterface;

/**
 * Interface for represent http server request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface ServerRequestInterface extends
    RequestInterface,
    PsrServerRequestInterface
{

   const
       /**
        * @var string server index
        */
       SERVER_PROTOCOL = "SERVER_PROTOCOL",
       /**
        * @var string server index
        */
       SERVER_METHOD = "REQUEST_METHOD";

}
