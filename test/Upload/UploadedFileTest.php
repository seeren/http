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
 * @version 2.0.1
 */

namespace Seeren\Http\Test\Upload;

use Psr\Http\Message\UploadedFileInterface;
use Seeren\Http\Upload\UploadedFile;
use ReflectionClass;

/**
 * Class for test UploadedFile
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Upload
 * @final
 */
final class UploadedFileTest extends AbstractUploadedFileTest
{

   /**
    * {@inheritDoc}
    * @see \Seeren\Http\Test\Upload\AbstractUploadedFileTest::getUploadedFile()
    */
   protected final function getUploadedFile(): UploadedFileInterface
   {
       $testFile = __DIR__ . DIRECTORY_SEPARATOR . "dummy.txt";
       file_put_contents($testFile, "hello world");
       return (new ReflectionClass(UploadedFile::class))
              ->newInstanceArgs([[
                  "name" => "dummy",
                  "size" => null,
                  "tmp_name" => $testFile,
                  "error" => 0 ]]);
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Upload\UploadedFile::getError
    */
   public function testErrorNoFile()
   {
      $this->assertTrue(
          (new ReflectionClass(UploadedFile::class))
           ->newInstanceArgs([["tmp_name" => "bad tmp_name"]])
           ->getError() === 4
      );
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Upload\UploadedFile::getStream
    * @expectedException \RuntimeException
    */
   public function testGetStreamRuntimeException()
   {
       (new ReflectionClass(UploadedFile::class))
       ->newInstanceArgs([[]])
       ->getStream();
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Upload\UploadedFile::getStream
    * @covers \Seeren\Http\Upload\UploadedFile::moveTo
    * @expectedException \RuntimeException
    */
   public function testMoveToRuntimeException()
   {
       $dir = __DIR__
       . DIRECTORY_SEPARATOR
       . "readonly"
       . DIRECTORY_SEPARATOR
       . "moved.txt";
       chmod($dir, 0444);
       (new ReflectionClass(UploadedFile::class))
       ->newInstanceArgs([[]])
       ->moveTo($dir);
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getSize
    */
   public function testGetSize()
   {
       $this->assertTrue($this->getUploadedFile()->getSize() === 11);
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getClientFilename
    */
   public function testGetClientFilename()
   {
       $this->assertTrue(
           $this->getUploadedFile()
           ->getClientFileName() === "dummy");
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getClientMediaType
    */
   public function testGetClientMediaType()
   {
       $this->assertTrue(
           $this->getUploadedFile()
           ->getClientMediaType() === null);
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getStream
    */
   public function testGetStream()
   {
       parent::testGetStream();
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::detach
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getError
    * @covers \Seeren\Http\Upload\UploadedFile::moveTo
    * @covers \Seeren\Http\Upload\UploadedFile::getStream
    */
   public function testMoveTo()
   {
       parent::testMoveTo();
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::moveTo
    * @expectedException \InvalidArgumentException
    */
   public function testMoveToInvalidArgumentException()
   {
       parent::testMoveToInvalidArgumentException();
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getStream
    * @covers \Seeren\Http\Upload\UploadedFile::moveTo
    * @expectedException \RuntimeException
    */
   public function testMoveToRuntimeExceptionReadOnly()
   {
       parent::testMoveToRuntimeExceptionReadOnly();
   }

   /**
    * @covers \Seeren\Http\Upload\UploadedFile::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Upload\UploadedFile::getError
    */
   public function testGetError()
   {
       parent::testGetError();
   }

}
