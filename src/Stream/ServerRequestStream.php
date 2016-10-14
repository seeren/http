<?php

/**
 * This file contain Seeren\Http\Stream\ServerRequestStream class
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

namespace Seeren\Http\Stream;

use RuntimeException;

/**
 * Class for represent server request stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream
 */
class ServerRequestStream extends Stream
{

   /**
    * Construct ServerRequestStream
    * 
    * @return null
    * 
    * @throws RuntimeException on faillure
    */
   public function __construct()
   {
       try {
           parent::__construct("php://input", self::MODE_R);
       } catch (RuntimeException $e) {
           throw new RuntimeException(
               "Can't create ServerRequestStream: " . $e->getMessage());
       }
   }

}
