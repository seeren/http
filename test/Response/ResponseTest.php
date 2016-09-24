<?php

/**
 * This file contain Seeren\Http\Test\Response\ResponseTest class
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

use Psr\Http\Message\ResponseInterface;
use Seeren\Http\Response\Response;
use Seeren\Http\Stream\ServerResponseStream;

/**
 * Class for test Response
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response\Test
 */
class ResponseTest extends ResponseInterfaceTest
{

   /**
    * Get ResponseInterface
    *
    * @return ResponseInterface response
    */
   protected function getResponse(): ResponseInterface
   {
       return $this->getMock(
           Response::class,
           [],
           [$this->getMock(ServerResponseStream::class)]);
   }

   /**
    * Test Response::setHeader
    */
   public final function testSetHeader()
   {
       $mock = $this->getMessage();
       $nHeader = count($mock->getHeaders());
       $mock->setHeader("Location", "/");
       $this->assertTrue(++$nHeader === count($mock->getHeaders()));
   }

   /**
    * Test Response::removeHeader
    */
   public final function testRemoveHeader()
   {
       $mock = $this->getMessage();
       $mock->setHeader("Location", "/");
       $nHeader = count($mock->getHeaders());
       $mock->removeHeader("Location");
       $this->assertTrue(--$nHeader === count($mock->getHeaders()));
   }

}
