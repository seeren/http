<?php

/**
 * This file contain Seeren\Http\Test\Stream\ServerRequestStreamTest class
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

namespace Seeren\Http\Test\Stream;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\ServerRequestStream;
use ReflectionClass;

/**
 * Class for test ServerRequestStream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream\Test
 * @final
 */
final class ServerRequestStreamTest extends StreamInterfaceTest
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   protected final function getStream(): StreamInterface
   {
       return (new ReflectionClass(ServerRequestStream::class))
              ->newInstanceArgs([]);
   }

}
