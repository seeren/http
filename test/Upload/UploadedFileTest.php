<?php

/**
 * This file contain Seeren\Http\Test\Upload\UploadedFileTest class
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
use Seeren\Http\Upload\UploadedFile;

/**
 * Class for test UploadedFile
 * 
 * @category Seeren
 * @package Http
 * @subpackage Upload\Test
 * @final
 */
final class UploadedFileTest extends UploadedFileInterfaceTest
{

   /**
    * Get UploadedFileInterface
    *
    * @return UploadedFileInterface uploaded file
    */
   protected final function getUploadedFile(): UploadedFileInterface
   {
       $testFile = __DIR__ . DIRECTORY_SEPARATOR . "testFile.txt";
       file_put_contents($testFile, "upload test");
       return $this->getMock(UploadedFile::class, [], [[
           "name" => "testFile",
           "size" => null,
           "type" => null,
           "tmp_name" => $testFile,
           "error" => 0              
    ]]);
   }

}
