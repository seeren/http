<?php

/**
 * This file contain Seeren\Http\Response\ServerResponse class
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
    * Construct ServerResponse
    * 
    * @param ServerResponseStream $stream response stream
    * @param string $version protocol version
    * @return null
    */
   public function __construct(ServerResponseStream $stream, $version = "1.1")
   {
       parent::__construct($stream, $version);
   }

}
