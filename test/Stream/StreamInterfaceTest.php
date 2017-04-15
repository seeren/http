<?php

/**
 * This file contain Seeren\Http\Test\Stream\StreamInterfaceTest class
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

namespace Seeren\Http\Test\Stream;

use Psr\Http\Message\StreamInterface;

/**
 * Class for test StreamInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream\Test
 * @abstract
 */
abstract class StreamInterfaceTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   abstract protected function getStream(): StreamInterface;

   /**
    * Test StreamInterface::close
    */
   public final function testClose()
   {
       $stream = $this->getStream();
       $stream->close();
       $this->assertTrue(
           $stream->isWritable() === false
        && $stream->isReadable() === false
        && $stream->isSeekable() === false
       );
   }

   /**
    * Test StreamInterface::detach
    */
   public final function testDetach()
   {
       $stream = $this->getStream();
       $this->assertTrue(
           null !== $stream->detach()
        && null === $stream->detach()
       );
   }

   /**
    * Test StreamInterface::getSize
    */
   public final function testGetSize()
   {
       $stream = $this->getStream();
       $size = (int) $stream->getSize();
       if ($stream->isWritable()) {
           ob_start();
           $stream->write("test stream");
           ob_end_clean();
           $size += 11;
       } else {
           $size = null;
       }
       $this->assertTrue($size === $stream->getSize());
   }

   /**
    * Test StreamInterface::tell
    *
    * @expectedException \RuntimeException
    */
   public final function testTell()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->tell();
   }

   /**
    * Test StreamInterface::eof
    */
   public final function testEof()
   {
       $stream = $this->getStream();
       if ($stream->isReadable()) {
           $stream->__toString();
           $this->assertTrue($stream->eof() === true);
       } else {
           $this->assertTrue($stream->eof() === false);
           
       }
   }

   /**
    * Test StreamInterface::isSeekable
    */
   public final function testISeekable()
   {
       $stream = $this->getStream();
       $this->assertTrue(
           $stream->isSeekable() === (bool) $stream->getMetadata("seekable"));
   }

   /**
    * Test StreamInterface::seek
    *
    * @expectedException \RuntimeException
    */
   public final function testSeek()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->seek(1);
   }

   /**
    * Test StreamInterface::rewind
    *
    * @expectedException \RuntimeException
    */
   public final function testrewind()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->rewind();
   }

}
