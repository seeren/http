<?php

/**
 * This file contain Seeren\Http\Test\Request\RequestInterfaceTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.0
 */

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Seeren\Http\Test\Message\MessageInterfaceTest;
use Seeren\Http\Uri\Uri;
use ReflectionClass;

/**
 * Class for test RequestInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request\Test
 * @abstract
 */
abstract class RequestInterfaceTest extends MessageInterfaceTest
{

   /**
    * Get RequestInterface
    *
    * @return RequestInterface request
    */
   abstract protected function getRequest(): RequestInterface;

   /**
    * Get MessageInterface
    *
    * @return MessageInterface message
    */
   protected function getMessage(): MessageInterface
   {
       return $this->getRequest();
   }

   /**
    * Test RequestInterface::withRequestTarget
    */
   public final function testWithRequestTarget()
   {
       $mock = $this->getRequest();
       $target = $mock->getRequestTarget();
       $this->assertTrue(
           $mock->withRequestTarget("target")->getRequestTarget() === "target"
        && $mock->getRequestTarget() === $target
       );
   }

   /**
    * Test RequestInterface::withMethod
    */
   public final function testWithMethod()
   {
       $mock = $this->getRequest();
       $method = $mock->getMethod();
       $this->assertTrue(
           $mock->withMethod("PUT")->getMethod() === "PUT"
        && $mock->getMethod() === $method
       );
   }

   /**
    * Test RequestInterface::withMethod Exceptions
    * 
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidMethod
    */
   public final function testWithMethodExceptions($method)
   {
       $this->getRequest()->withMethod($method);
   }

   public final function provideInvalidMethod()
   {
       return [
           [""],
           [true],
           ["foo"],
           [1]
       ];
   }

   /**
    * Test RequestInterface::withUri
    */
   public final function testWithUri()
   {
       $request = $this->getRequest()->withoutHeader("Host", "foo");
       $uri = (new ReflectionClass(Uri::class))
              ->newInstanceArgs(["http", "bar"]);     
       $this->assertTrue(
           $request->withUri($uri, true)->getHeader("Host")
       === [$uri->getHost("Host")]
        && $request->withUri($uri->withHost("baz"), true)->getHeader("Host")
       !== [$uri->getHost("Host")]
       );
   }

}
