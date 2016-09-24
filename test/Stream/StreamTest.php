<?php

/**
 * This file contain Seeren\Http\Test\Stream\StreamTest class
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
use Seeren\Http\Stream\Stream;

/**
 * Class for test Stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream\Test
 * @final
 */
final class StreamTest extends StreamInterfaceTest
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   protected final function getStream(): StreamInterface
   {
       return $this->getMock(
           Stream::class,
           [],
           ["php://temp/", Stream::MODE_R_MORE]
       );
   }

}
