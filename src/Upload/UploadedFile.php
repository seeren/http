<?php

/**
 * This file contain Seeren\Http\Upload\UploadedFile class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.1.3
 */

namespace Seeren\Http\Upload;

use Psr\Http\Message\UploadedFileInterface as PsrUploadedFileInterface;
use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\Stream;
use InvalidArgumentException;
use RuntimeException;

/**
 * Class for represente an uploaded file
 * 
 * @category Seeren
 * @package Http
 * @subpackage Upload
 */
class UploadedFile implements PsrUploadedFileInterface, UploadedFileInterface
{

   protected
       /**
        * @var StreamInterface body
       */
       $body,
       /**
        * @var string file name
        */
       $name,
       /**
        * @var string file type
        */
       $type,
       /**
        * @var string file tmp_name
        */
       $tmpName,
       /**
        * @var int file error
        */
       $error,
       /**
        * @var int file size
        */
       $size;

   /**
    * Construct UploadedFile
    * 
    * @param array $file parsed file
    * @return null
    */
   public function __construct(array $file)
   {
       $this->name = array_key_exists(self::NAME, $file)
                   ? (string) $file[self::NAME]
                   : null;
       $this->type = array_key_exists(self::TYPE, $file)
                   ? (string) $file[self::TYPE]
                   : null;
       $this->error = array_key_exists(self::ERROR, $file)
                    ? (int) $file[self::ERROR]
                    : null;
       if (array_key_exists(self::TMP, $file)) {
           try {
               $this->tmpName = (string) $file[self::TMP];
               $this->body = new Stream($this->tmpName, Stream::MODE_R);
               $this->size = $this->body->getSize("size");
           } catch (InvalidArgumentException $e) {
               $this->error = 4;
           }
       }
   }

   /**
    * Get stream
    *
    * @return StreamInterface uploaded file body
    * @throws RuntimeException 
    */
   public final function getStream(): StreamInterface
   {
       if (!$this->body) {
           throw new RuntimeException("Can't get Stream: ressource no found");
       }
       return $this->body;
   }

    /**
     * Move the uploaded file
     * 
     * @param string $targetPath target path
     * 
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public final function moveTo($targetPath)
    {    
        $path = str_replace(["/", "\\"], DIRECTORY_SEPARATOR, $targetPath);
        $lastDirPos = strripos($path, DIRECTORY_SEPARATOR);
        $dir  = $lastDirPos ? substr($path, 0, $lastDirPos + 1) : null;
        if (!$dir || !is_dir($dir)) {
            throw new InvalidArgumentException("Can't move to: " . $path);
        }
        try {
            if (false === @file_put_contents(
                    $path,
                    (string) $this->getStream())) {
                throw new RuntimeException("Can't move to: " . $path);
            }
        } catch (RuntimeException $e) {
            throw $e;
        }
        $this->body->detach();
        $this->body = null;
        @unlink($this->tmpName);
    }

   /**
    * Get size
    *
    * @return int|null file size
    */
   public final function getSize()
   {
       return $this->size;
   }

   /**
    * Get file error
    *
    * @return int UPLOAD_ERR_XXX
    */
   public final function getError(): int
   {
       return $this->error;
   }

   /**
    * Get file name
    *
    * @return string|null file name
    */
   public final function getClientFilename()
   {
       return $this->name;
   }

   /**
    * Get file type
    *
    * @return string|null file type
    */
   public final function getClientMediaType()
   {
       return $this->type;
   }

}
