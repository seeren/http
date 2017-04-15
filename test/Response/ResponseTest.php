<?php

/**
 * This file contain Seeren\Http\Test\Response\ResponseTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.0
 */

namespace Seeren\Http\Test\Response;

use Psr\Http\Message\ResponseInterface;
use Seeren\Http\Response\Response;
use Seeren\Http\Stream\ServerResponseStream;
use ReflectionClass;

/**
 * Class for test Response
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response\Test
 */
class ResponseTest extends ResponseInterfaceTest
{

   /**
    * Get ResponseInterface
    *
    * @return ResponseInterface response
    */
   protected function getResponse(): ResponseInterface
   {
       return (new ReflectionClass(Response::class))
              ->newInstanceArgs([
                    (new ReflectionClass(ServerResponseStream::class))
                    ->newInstanceArgs([])
              ]);
   }

}
