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
 * @version 1.0.3
 */

namespace Seeren\Http\Stream;

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
    */
   public function __construct()
   {
       parent::__construct("php://output", self::MODE_W);
   }

}
