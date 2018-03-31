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
 * @version 1.0.2
 */

namespace Seeren\Http\Response;

use Seeren\Http\Stream\ServerResponseStream;

/**
 * Class for represente http server response
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response
 */
class ServerResponse extends Response
{

   /**
    * @param ServerResponseStream $stream response stream
    * @param string $version protocol version
    */
   public function __construct(ServerResponseStream $stream, $version = "1.1")
   {
       parent::__construct($stream, $version);
   }

}
