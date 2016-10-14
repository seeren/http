<?php

/**
 * This file contain Seeren\Http\Request\RequestInterface interface
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

use Seeren\Http\Message\MessageInterface;

/**
 * Interface for represent http request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface RequestInterface extends MessageInterface
{

   const
       /**
        * @var string method name
        */
       GET = "GET",
       /**
        * @var string method name
        */
       POST = "POST",
       /**
        * @var string method name
        */
       PUT = "PUT",
       /**
        * @var string method name
        */
       DELETE = "DELETE";

}
