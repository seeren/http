<?php

/**
 * This file contain Seeren\Http\Test\Upload\UploadedFileInterfaceTest class
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

namespace Seeren\Http\Test\Upload;

use Psr\Http\Message\UploadedFileInterface;

/**
 * Class for test UploadedFileInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Upload\Test
 * @abstract
 */
abstract class UploadedFileInterfaceTest extends \PHPUnit_Framework_TestCase
{

   /**
    * Get UploadedFileInterface
    *
    * @return UploadedFileInterface uploaded file
    */
   abstract protected function getUploadedFile(): UploadedFileInterface;

   /**
    * Test UploadedFileInterface::moveTo
    */
   public final function testMoveTo()
   {
       $mock = $this->getUploadedFile();
       $targetPath = __DIR__ . DIRECTORY_SEPARATOR . "tmp.txt";
       $mock->moveTo($targetPath);
       $this->assertTrue(0 === $mock->getError());
   }

   /**
    * Test UploadedFileInterface::moveTo InvalidArgumentException
    * 
    * @expectedException \InvalidArgumentException
    */
   public final function testMoveToInvalidArgumentException()
   {
       $mock = $this->getUploadedFile();
       $targetPath = "bad target";
       $mock->moveTo($targetPath);
   }

}
