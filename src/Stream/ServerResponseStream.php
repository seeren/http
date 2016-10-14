<?php

/**
 * This file contain Seeren\Http\Stream\ServerResponseStream class
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
 * Class for represent server response stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream
 */
class ServerResponseStream extends Stream
{

   /**
    * Construct ServerResponseStream
    * 
    * @return null
    * 
    * @throws RuntimeException on faillure
    */
   public function __construct()
   {
       try {
           parent::__construct("php://output", self::MODE_W);
       } catch (RuntimeException $e) {
           throw new RuntimeException(
               "Can't create ResponseStream: " . $e->getMessage());
       }
   }

}
