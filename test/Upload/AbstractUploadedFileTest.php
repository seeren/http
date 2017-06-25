<?php

/**
 * This file contain Seeren\Http\Test\Upload\AbstractUploadedFileTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.1
 */

namespace Seeren\Http\Test\Upload;

use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class for test UploadedFileInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Upload
 * @abstract
 */
abstract class AbstractUploadedFileTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get UploadedFileInterface
    *
    * @return UploadedFileInterface uploaded file
    */
   abstract protected function getUploadedFile(): UploadedFileInterface;

   /**
    * Test get stream run time exception
    */
   abstract public function testGetStreamRuntimeException();

   /**
    * Test get move to run time exception
    */
   abstract public function testMoveToRuntimeException();

   /**
    * Test get client media type
    */
   abstract public function testGetClientMediaType();

   /**
    * Test get client file name
    */
   abstract public function testGetClientFilename();

   /**
    * Test get size
    */
   abstract public function testGetSize();

   /**
    * Test get stream
    */
   public function testGetStream()
   {
       $this->assertTrue(
           $this->getUploadedFile()
           ->getStream() instanceof StreamInterface);
   }

   /**
    * Test move to
    */
   public function testMoveTo()
   {
       $uploaded = $this->getUploadedFile();
       $uploaded->moveTo(__DIR__ . DIRECTORY_SEPARATOR . "moved.txt");
       $this->assertTrue(0 === $uploaded->getError());
   }

   /**
    * Test move to invalid argument exception
    */
   public function testMoveToInvalidArgumentException()
   {
       $this->getUploadedFile()
       ->moveTo("bad target");
   }

   /**
    * Test get move to run time exception
    */
   public function testMoveToRuntimeExceptionReadOnly()
   {
       $this->getUploadedFile()->moveTo(
           __DIR__
         . DIRECTORY_SEPARATOR
         . "readonly"
         . DIRECTORY_SEPARATOR
         . "moved.txt");
   }

   /**
    * Test get error
    */
   public function testGetError()
   {
       $this->assertTrue($this->getUploadedFile()->getError() === 0);
   }

}
