<?php

/**
 * This file contain Seeren\Http\Test\Stream\AbstractStreamTest class
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
abstract class AbstractStreamTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   abstract protected function getStream(): StreamInterface;

   /**
    * Test to string
    */
   public function testToString()
   {
       $this->assertTrue(is_string($this->getStream()->__toString()));
   }

   /**
    * Test close
    */
   public function testClose()
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
    * Test detach
    */
   public function testDetach()
   {
       $stream = $this->getStream();
       $this->assertTrue(
           null !== $stream->detach()
        && null === $stream->detach()
       );
   }

   /**
    * Test get size
    */
   public function testGetSize()
   {
       $stream = $this->getStream();
       $size = $stream->getSize();
       if ($stream->isWritable()) {
           ob_start();
           $stream->write("test stream");
           ob_end_clean();
           $size += 11;
       }
       $this->assertTrue(
           ($size === null ? null : $size)
       === $stream->getSize());
   }

   /**
    * Test tell run time exception
    */
   public function testTellRuntimeException()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->tell();
   }

   /**
    * Test eof
    */
   public function testEof()
   {
       $stream = $this->getStream();
       $state = false;
       if ($stream->isReadable()) {
           $stream->__toString();
           $state = true;
       }
       $this->assertTrue($stream->eof() === $state);
   }

   /**
    * Test is seekable
    */
   public function testISeekable()
   {
       $stream = $this->getStream();
       $this->assertTrue(
           $stream->isSeekable() === (bool) $stream->getMetadata("seekable"));
   }

   /**
    * Test seek run time exception
    *
    */
   public function testSeekRuntimeException()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->seek(1);
   }

   /**
    * Test rewind run time exception
    */
   public function testRewindRuntimeException()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->rewind();
   }

   /**
    * Test write run time exception
    */
   public function testWriteRuntimeException()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->write("1");
   }

   /**
    * Test read run time exception
    */
   public function testReadRuntimeException()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->read(1);
   }

   /**
    * Test get contents run time exception
    */
   public function testGetContentsRuntimeException()
   {
       $stream = $this->getStream();
       $stream->close();
       $stream->getContents();
   }

   /**
    * Test get meta data
    */
   public function testGetMetadata()
   {
       $stream = $this->getStream();
       $this->assertTrue(
           is_bool($stream->getMetadata("readable"))
        && is_array($stream->getMetadata())
       );
   }

}
