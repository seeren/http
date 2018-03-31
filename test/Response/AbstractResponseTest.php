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

namespace Seeren\Http\Test\Response;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Seeren\Http\Test\Message\AbstractMessageTest;

/**
 * Class for test ResponseInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Response
 * @abstract
 */
abstract class AbstractResponseTest extends AbstractMessageTest
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

   public final function provideInvalidCode()
   {
       return [
           [103],
           [227],
           [311],
           [457],
           [521],
       ];
   }

   /**
    * Test with status
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidCode
    */
   public function testWithStatus($code)
   {
       $this->getMessage()->withStatus($code);
   }

   /**
    * Test get status code
    */
   public function testGetStatusCode()
   {
       $this->assertTrue(
           101
       === $this->getMessage()
           ->withStatus(101)
           ->getStatusCode());
   }

   /**
    * Test get reason phrase
    */
   public function testGetReasonPhrase()
   {
       $this->assertTrue(
           "Switching Protocols"
       === $this->getMessage()
           ->withStatus(101)
           ->getReasonPhrase());
   }

}
