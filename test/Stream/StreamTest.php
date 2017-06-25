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
 * @link https://github.com/seeren/http
 * @version 2.0.1
 */

namespace Seeren\Http\Test\Stream;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\Stream;
use ReflectionClass;

/**
 * Class for test Stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Stream
 * @final
 */
final class StreamTest extends AbstractStreamTest
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   protected final function getStream(): StreamInterface
   {
       return (new ReflectionClass(Stream::class))
              ->newInstanceArgs(["php://temp/", Stream::MODE_R_MORE]);
   }

   /**
    * Provide readable writable for mode
    */
   public final function readableWritableProvider()
   {
        return [
            ["r", true, false],
            ["w", false, true],
            ["a", false, true],
            ["c", false, true],
            ["x", false, true],
            ["r+", true, true],
            ["w+", true, true],
            ["a+", true, true],
            ["c+", true, true],
            ["x+", true, true],
        ];   
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    */
   public function testConstructionRessourceInvalidArgumentException()
   {
       $this->getStream()->__construct(
           "bad value",
           "r",
           stream_context_create([
               "http" => [
                   "method" => "POST",
                   "header"=> "Content-Type: application/x-www-form-urlencoded"
                            . "\r\n",
                   "content" => http_build_query(["key" => "value"])
           ]]));
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    */
   public function testConstructionTargetInvalidArgumentException()
   {
       $this->getStream()->__construct("bad value", "r");
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @dataProvider readableWritableProvider
    */
   public function testIsReadableAndIsWritable($mode,$readable, $writable)
   {
       $stream = $this->getStream();
       $stream->__construct("php://temp/", $mode);
       $this->assertTrue(
           $stream->isReadable() === $readable
           && $stream->isWritable() === $writable);
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testToString()
   {
       parent::testToString();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testClose()
   {
       parent::testClose();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::detach
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testDetach()
   {
       parent::testDetach();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testGetSize()
   {
       parent::testGetSize();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::tell
    * @expectedException \RuntimeException
    */
   public function testTellRuntimeException()
   {
       parent::testTellRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::tell
    */
   public function testTell()
   {
       $this->assertTrue(is_int($this->getStream()->tell()));
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::eof
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testEof()
   {
       parent::testEof();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testISeekable()
   {
       parent::testISeekable();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::seek
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \RuntimeException
    */
   public function testSeekRuntimeException()
   {
       parent::testSeekRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::seek
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testSeek()
   {
       $stream = $this->getStream();
       $stream->write("foo");
       $this->assertTrue($stream->seek(1) === null);
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \RuntimeException
    */
   public function testRewindRuntimeException()
   {
       parent::testRewindRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testRewind()
   {
       $stream = $this->getStream();
       $stream->write("foo");
       $this->assertTrue($stream->rewind() === null);
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::write
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \RuntimeException
    */
   public function testWriteRuntimeException()
   {
       parent::testWriteRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::read
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \RuntimeException
    */
   public function testReadRuntimeException()
   {
       parent::testReadRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::read
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    */
   public function testRead()
   {
       $stream = $this->getStream();
       $stream->write("foo");
       $stream->rewind();
       $this->assertTrue($stream->read(3) === "foo");
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \RuntimeException
    */
   public function testGetContentsRuntimeException()
   {
       parent::testGetContentsRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetMetadata()
   {
       parent::testGetMetadata();
   }

}
