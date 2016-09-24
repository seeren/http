<?php

/**
 * This file contain Seeren\Http\Request\ServerRequest interface
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

namespace Seeren\Http\Request;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface for represent http server request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
interface ServerRequestInterface extends
    ServerRequestInterface,
    RequestInterface
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

   /**
    * Set attribute
    *
    * @param string $name attribute name
    * @param mixed $default default value
    * @return mixed
    */
   public function setAttribute(string $name, $value);

   /**
    * Remove attribute
    *
    * @param string $name header case-insensitive name
    * @return bool removed or not
    */
   public function removeAttribute(string $name): bool;

}
