<?php

/**
 * This file contain Seeren\Http\Stream\Stream class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.3
 */

namespace Seeren\Http\Stream;

use Psr\Http\Message\StreamInterface as PsrStreamInterface;
use InvalidArgumentException;
use RuntimeException;

/**
 * Class for represent stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream
 */
class Stream implements PsrStreamInterface, StreamInterface
{

   protected
       /**
        * @var ressource stream handle
        */
       $stream,
       /**
        * @var array stream metadata
        */
       $meta;

   /**
    * Construct Stream
    * 
    * @param string $target ressource target
    * @param string $mode ressource mode
    * @param ressource $context ressource context
    * @return null
    * 
    * @throws InvalidArgumentException
    */
   public function __construct(string $target, string $mode, $context = null)
   {
       if (is_resource($context)) {
           if (!($this->stream = @fopen($target, $mode, false, $context))) {
               throw new InvalidArgumentException(
                   "Can't create Stream: unavailable target for context"); 
           }
       } else if (!($this->stream = @fopen($target, $mode))) {
           throw new InvalidArgumentException(
               "Can't create Stream: unavailable target");         
       }
       $this->meta = stream_get_meta_data($this->stream);
       $this->setReadableWritable($mode);
       $this->meta["size"] = ($stat = fstat($this->stream))
                          && array_key_exists("size", $stat)
                           ? $stat["size"]
                           : null;
   }

   /**
    * Set stream readable and writable status
    *
    * @param string $mode ressource mode
    * @return null
    */
   private final function setReadableWritable(string $mode)
   {
      if (self::MODE_R === $mode) {
          $this->meta["readable"] = true;
          $this->meta["writable"] = false;
      } else if (self::MODE_W === $mode
              || self::MODE_A === $mode
              || self::MODE_C === $mode
              || self::MODE_X === $mode) {
          $this->meta["readable"] = false;
          $this->meta["writable"] = true;
      } else if (self::MODE_R_MORE === $mode
              || self::MODE_W_MORE === $mode    
              || self::MODE_A_MORE === $mode
              || self::MODE_C_MORE === $mode
              || self::MODE_X_MORE === $mode) {
          $this->meta["readable"] = true;
          $this->meta["writable"] = true;
       }
   }

   /**
    * StreamInterface to string
    *
    * @return string
    */
   public final function __toString(): string
   {
       try {
           return $this->getContents();
       } catch (RuntimeException $e) {
           return "";
       }
   }

   /**
    * Closes stream
    *
    * @return null
    */
   public final function close()
   {
       fclose($this->stream);
      $this->meta = [
          "size" => null,
          "readable" => false,
          "writable" => false
      ];
   }

   /**
    * Detach stream
    *
    * @return resource|null ressource if any stream
    */
   public final function detach()
   {
       $stream = null;
       if ($this->stream) {
           $this->close();
           $stream = $this->stream;
           $this->stream = null;
       }
       return $stream;
   }

   /**
    * Get stream size
    *
    * @return int|null the size in bytes
    */
   public final function getSize()
   {
       return $this->getMetadata("size");
   }

    /**
    * Get pointer position
    *
    * @return int pointer position
    * 
    * @throws RuntimeException
    */
   public final function tell(): int
   {
       if (!$this->isSeekable()) {
           throw new RuntimeException("Can't tell: stream is not seekable");
       }
       return ftell($this->stream);
   }

   /**
    * Is end of file
    *
    * @return bool
    */
   public final function eof(): bool
   {
       return $this->meta["eof"];
   }

   /**
    * Is seekable
    *
    * @return bool
    */
   public final function isSeekable(): bool
   {
       return (bool) $this->getMetadata("seekable");
   }

   /**
    * Seek stream to offset
    *
    * @param int $offset offset
    * @param int $whence seek mode
    * 
    * @return null
    * 
    * @throws RuntimeException on failure
    */
   public final function seek($offset, $whence = SEEK_SET)
   {
       if (!$this->isSeekable()
        || -1 === fseek($this->stream, $offset, $whence)) {
           throw new RuntimeException("Can't seek: stream is not seekable");
       }
   }

   /**
    * Rewind stream
    *
    * @return null
    *
    * @throws RuntimeException
    */
   public final function rewind()
   {
       if (!$this->isReadable() || !$this->isSeekable()) {
           throw new RuntimeException("Can't rewind: stream is not readable");
       }
       rewind($this->stream);
       $this->meta["eof"] = false;
   }

   /**
    * Is writable
    *
    * @return bool
    */
   public final function isWritable(): bool
   {
       return $this->getMetadata("writable");
   }
    
   /**
    * Is readable
    *
    * @return bool
    */
   public final function isReadable(): bool
   {
       return $this->getMetadata("readable");
   }

   /**
    * Write
    *
    * @param string $string body part
    * @return int number of bytes
    * 
    * @throws RuntimeException
    */
   public final function write($string): int
   {
       if (!$this->isWritable()) {
           throw new RuntimeException("Can't write: stream is not writable");
       }
       $this->meta["eof"] = true;
	   if (($size = (int) fwrite($this->stream, (string) $string))) {
		    $this->meta["size"] = $this->getMetadata("size") + $size;
	   }
       return $size;
   }

   /**
    * Read
    *
    * @param int $length number of bytes
    * @return string data read
    * 
    * @throws RuntimeException
    */
   public final function read($length): string
   {
       if (!$this->isReadable()) {
           throw new RuntimeException("Can't read: stream is not readable");
       }
       $read = (string) fread($this->stream, (int) $length);
       $this->meta["eof"] = !$read ? true : false;
       return $read;
   }

   /**
    * Returns the remaining contents in a string
    *
    * @return string
    * @throws RuntimeException
    */
   public final function getContents(): string
   {
       if (!$this->isReadable()) {
           throw new RuntimeException(
               "Can't getContents: stream is not readable");
       }
       $this->meta["eof"] = true;
       return (string) stream_get_contents($this->stream);
   }

   /**
    * Get stream metadata
    * 
    * @param string $key metadata key
    * @return array|mixed|null meta or value for key or null
    */
   public final function getMetadata($key = null)
   {
       return isset($key)
            ? (array_key_exists($key, $this->meta) ? $this->meta[$key] : null)
            : $this->meta;
   }

}
