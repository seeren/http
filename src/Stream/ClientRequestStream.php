<?php

/**
 * This file contain Seeren\Http\Stream\ClientRequestStream class
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

namespace Seeren\Http\Stream;

use RuntimeException;

/**
 * Class for represent client request stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream
 */
class ClientRequestStream extends Stream
{

   /**
    * Construct ClientRequestStream
    * 
    * @return null
    * 
    * @throws RuntimeException on faillure
    */
   public function __construct()
   {
       try {
           parent::__construct("php://temp", self::MODE_R_MORE);
       } catch (RuntimeException $e) {
           throw new RuntimeException(
               "Can't create ClientRequestStream: " . $e->getMessage());
       }
   }

}
