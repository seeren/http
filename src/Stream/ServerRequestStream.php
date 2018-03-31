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
 * @version 1.0.4
 */

namespace Seeren\Http\Stream;

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
    */
   public function __construct()
   {
       parent::__construct("php://input", self::MODE_R);
       $body = $this->__toString();
       $this->stream = @fopen("php://temp", self::MODE_R_MORE);
       $this->meta["writable"] = true;
       $this->write($body);
       $this->rewind();
       $this->meta["writable"] = false;
   }

}
