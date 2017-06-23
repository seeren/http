<?php

/**
 * This file contain Seeren\Http\Test\Stream\ServerResponseStreamTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 2.0.1
 */

namespace Seeren\Http\Test\Stream;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\ServerResponseStream;
use ReflectionClass;

/**
 * Class for test ServerResponseStream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream\Test
 * @final
 */
final class ServerResponseStreamTest extends AbstractStreamTest
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   protected final function getStream(): StreamInterface
   {
       return (new ReflectionClass(ServerResponseStream::class))
              ->newInstanceArgs([]);
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testToString()
   {
       parent::testToString();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testClose()
   {
       parent::testClose();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::detach
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testDetach()
   {
       parent::testDetach();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testGetSize()
   {
       parent::testGetSize();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::tell
    * @covers \Seeren\Http\Stream\Stream::write
    * @expectedException \RuntimeException
    */
   public function testTellRuntimeException()
   {
       parent::testTellRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::eof
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testEof()
   {
       parent::testEof();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testISeekable()
   {
       parent::testISeekable();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::seek
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    * @expectedException \RuntimeException
    */
   public function testSeekRuntimeException()
   {
       parent::testSeekRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    * @expectedException \RuntimeException
    */
   public function testRewindRuntimeException()
   {
       parent::testRewindRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    * @expectedException \RuntimeException
    */
   public function testWriteRuntimeException()
   {
       parent::testWriteRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::read
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    * @expectedException \RuntimeException
    */
   public function testReadRuntimeException()
   {
       parent::testReadRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    * @expectedException \RuntimeException
    */
   public function testGetContentsRuntimeException()
   {
       parent::testGetContentsRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testGetMetadata()
   {
       parent::testGetMetadata();
   }
   
}
