<?php

/**
 * This file contain Seeren\Http\Test\Response\ResponseInterfaceTest class
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

namespace Seeren\Http\Test\Response;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Seeren\Http\Test\Message\MessageInterfaceTest;
/**
 * Class for test ResponseInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response\Test
 * @abstract
 */
abstract class ResponseInterfaceTest extends MessageInterfaceTest
{

   /**
    * Get ResponseInterface
    *
    * @return ResponseInterface response
    */
   abstract protected function getResponse(): ResponseInterface;

   /**
    * Get MessageInterface
    *
    * @return MessageInterface message
    */
   protected function getMessage(): MessageInterface
   {
       return $this->getResponse();
   }

   /**
    * Test ResponseInterface::withStatus
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidCode
    */
   public final function testWithStatus($code)
   {
       $this->getMessage()->withStatus($code);
   }
   
   public final function provideInvalidCode()
   {
       return [
           [103],
           [227],
           [311],
           [457],
           [521]
       ];
   }
   /**
    * Test ResponseInterface::getStatusCode
    */
   public final function testGetStatusCode()
   {
       $mock = $this->getMessage()->withStatus(101);
       $this->assertTrue(101 === $mock->getStatusCode());
   }

   /**
    * Test ResponseInterface::getReasonPhrase
    */
   public final function testGetReasonPhrase()
   {
       $mock = $this->getMessage()->withStatus(101);
       $this->assertTrue("Switching Protocols" === $mock->getReasonPhrase());
   }

}
