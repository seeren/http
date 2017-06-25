<?php

/**
 * This file contain Seeren\Http\Test\Message\AbstractMessageTest class
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

namespace Seeren\Http\Test\Message;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\MessageInterface;
use Seeren\Http\Stream\Stream;
use ReflectionClass;
use stdClass;

/**
 * Class for test MessageInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Message
 * @abstract
 */
abstract class AbstractMessageTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get MessageInterface
    *
    * @return MessageInterface message
    */
   abstract protected function getMessage(): MessageInterface;

   /**
    * Get StreamInterface
    * 
    * @return StreamInterface stream
    */
   protected function getStream(): StreamInterface
   {
       return (new ReflectionClass(Stream::class))
       ->newInstanceArgs(["php://temp/", Stream::MODE_R_MORE]);
   }

   /**
    * Provide invalid header
    */
   public final function provideInvalidHeader()
   {
       return [
           [true],
           [1],
           [1.1],
           [null],
           [[]],
           [""],
           [(new ReflectionClass(stdClass::class))
               ->newInstanceArgs([])]
       ];
   }

   /**
    * Test with protocol version
    */
   public function testWithProtocolVersion()
   {
       $message = $this->getMessage();
       $this->assertTrue(
           $message
           ->withProtocolVersion("1.1")
           ->getProtocolVersion() === "1.1"
        && $message
           ->withProtocolVersion(1.0)
           ->getProtocolVersion() === "1.0"
        && $message
           ->withProtocolVersion("1.0")
           ->getProtocolVersion() === "1.0"
        && $message
           ->withProtocolVersion("foo")
           ->getProtocolVersion() === "1.1"
       );
   }

   /**
    * Test get header
    */
   public function testGetHeader()
   {
       $message = $this->getMessage();
       $this->assertTrue(
           count(
               $message
               ->getHeader("content-type")) === 0
        && count(
            $message
            ->withHeader("CoNtEnT-TyPe", "text/html;charset=utf8")
            ->getHeader("content-type")) === 2
        && count(
            $message
            ->withHeader("CoNtEnT-TyPe", ["text/html", "charset=utf8"])
            ->getHeader("content-type")) === 2
       );
   }

   /**
    * Test has header
    */
   public function testHasHeader()
   {
       $this->assertTrue(
           $this->getMessage()
           ->withHeader("LoCaTiOn", "/")
           ->hasHeader("location"));
   }

   /**
    * Test get header line
    */
   public function testGetHeaderLine()
   {
       $message = $this->getMessage();
       $this->assertTrue(
           $message
           ->withHeader("CoNtEnT-TyPe", ["text/html", "charset=utf8"])
           ->getHeaderLine("content-type")
      === "text/html,charset=utf8"
       && $message->getHeaderLine("content-type")
      === ""
       );
   }

   /**
    * Test with header invalid argument exception
    */
   public function testWithHeaderInvalidArgumentException($value)
   {
       $this->getMessage()->withHeader("Location", $value);
   }

   /**
    * Test with header
    */
   public function testWithHeader()
   {
       $message = $this->getMessage();
       $this->assertTrue(
           count(
               $message
               ->getHeaders()) + 1
       === count(
               $message
               ->withHeader("Location", "/")
               ->getHeaders())
       );
   }

   /**
    * Test with added header invalid argument exception
    */
   public function testWithAddedHeaderInvalidArgumentException($value)
   {
       $this->getMessage()->withAddedHeader("Location", $value);
   }

   /**
    * Test with added header
    */
   public function testWithAddedHeader()
   {
       $message = $this
       ->getMessage();
       $this->assertTrue(
           count(
               $message
               ->withAddedHeader("Location", "/")
               ->getHeaders())
       === count(
               $message
               ->withAddedHeader("Location", "/")
               ->getHeaders())
       );
   }

   /**
    * Test without header
    */
   public function testWithoutHeader()
   {
       $message = $this
       ->getMessage()
       ->withHeader("Location", "/");
       $this->assertTrue(
           count($message->getHeaders()) - 1
       === count(
               $message
               ->withoutHeader("Location")
               ->getHeaders())
       );
   }

   /**
    * Test get body
    */
   public function testGetBody()
   {
       $this->assertTrue(
           $this
           ->getMessage()
           ->getBody() instanceof StreamInterface
       );
   }

   /**
    * Test with body invalid argument exception
    */
   public function testWithBodyInvalidArgumentException()
   {
       $body = $this->getStream();
       $body->detach();
       $this
       ->getMessage()
       ->withBody($body);
   }

   /**
    * Test with body
    */
   public function testWithBody()
   {
       $body = $this->getStream();
       $this->assertTrue(
           $this
           ->getMessage()
           ->withBody($body)
           ->getBody() === $body
      );
   }

}
