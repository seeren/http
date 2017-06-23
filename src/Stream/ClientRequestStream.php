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
 * @link https://github.com/seeren/http
 * @version 1.0.2
 */

namespace Seeren\Http\Stream;

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
    */
   public function __construct()
   {
       parent::__construct("php://temp", self::MODE_R_MORE);
   }

}
