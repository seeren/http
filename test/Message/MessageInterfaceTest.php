<?php

/**
 * This file contain Seeren\Http\Test\Message\MessageInterfaceTest class
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

namespace Seeren\Http\Test\Message;

use Psr\Http\Message\MessageInterface;

/**
 * Class for test MessageInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Message\Test
 * @abstract
 */
abstract class MessageInterfaceTest extends \PHPUnit_Framework_TestCase
{

   /**
    * Get MessageInterface
    *
    * @return MessageInterface message
    */
   abstract protected function getMessage(): MessageInterface;

   /**
    * Test MessageInterface::withProtocolVersion
    */
   public final function testWithProtocolVersion()
   {
       $mock = $this->getMessage();
       $this->assertTrue(
           $mock->withProtocolVersion("1.1")->getProtocolVersion() === "1.1"
        && $mock->withProtocolVersion(1.0)->getProtocolVersion() === "1.0"
        && $mock->withProtocolVersion("1.0")->getProtocolVersion() === "1.0"
        && $mock->withProtocolVersion("foo")->getProtocolVersion() === "1.1"
       );
   }

   /**
    * Test MessageInterface::hasHeader
    */
   public final function testHasHeader()
   {
       $mock = $this->getMessage()->withHeader("LoCaTiOn", "/");
       $this->assertTrue($mock->hasHeader("location"));
   }

   /**
    * Test MessageInterface::getHeader
    */
   public final function testGetHeader()
   {
       $mock = $this->getMessage();
       $this->assertTrue(
           count($mock->getHeader("content-type")) === 0
        && count($mock->withHeader("CoNtEnT-TyPe", "text/html;charset=utf8")
                      ->getHeader("content-type")) === 2
        && count($mock->withHeader("CoNtEnT-TyPe", ["text/html", "charset=utf8"])
                      ->getHeader("content-type")) === 2
       );
   }


   /**
    * Test MessageInterface::getHeaderLine
    */
   public final function testGetHeaderLine()
   {
       $mock = $this->getMessage();
       $this->assertTrue(
           $mock->withHeader("CoNtEnT-TyPe", ["text/html", "charset=utf8"])
                ->getHeaderLine("content-type") === "text/html,charset=utf8"
           );
   }

   /**
    * Test ResponseInterface::withHeader arguments
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHeader
    */
   public final function testWithHeaderArguments($value)
   {
       $this->getMessage()->withHeader("Location", $value);
   }

   public final function provideInvalidHeader()
   {
       return [
           [true],
           [1],
           [1.1],
           [null],
           [[]],
           [""],
           [$this->getMock("\stdClass")]
       ];
   }

   /**
    * Test ResponseInterface::withHeader
    */
   public final function testWithHeader()
   {
       $mock = $this->getMessage();
       $this->assertTrue(
           count($mock->getHeaders()) + 1
       === count($mock->withHeader("Location", "/")->getHeaders("Location"))
       );
   }

   /**
    * Test ResponseInterface::withAddedHeader
    */
   public final function testWithAddedHeader()
   {
       $mock = $this->getMessage()->withHeader("Location", "/");
       $this->assertTrue(
           count($mock->getHeaders())
       === count($mock->withHeader("Location", "/")->getHeaders("Location"))
       );
   }

   /**
    * Test ResponseInterface::withoutHeader
    */
   public final function testWithoutHeader()
   {
       $mock = $this->getMessage()->withHeader("Location", "/");
       $this->assertTrue(
           count($mock->getHeaders()) - 1
       === count($mock->withoutHeader("Location")->getHeaders("Location"))
       );
   }

}
