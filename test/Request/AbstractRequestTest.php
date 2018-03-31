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

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Seeren\Http\Test\Message\AbstractMessageTest;
use Seeren\Http\Uri\Uri;
use ReflectionClass;

/**
 * Class for test RequestInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Request
 * @abstract
 */
abstract class AbstractRequestTest extends AbstractMessageTest
{

   /**
    * Get RequestInterface
    *
    * @return RequestInterface request
    */
   abstract protected function getRequest(): RequestInterface;

   /**
    * {@inheritDoc}
    * @see \Seeren\Http\Test\Message\AbstractMessageTest::getMessage()
    */
   protected function getMessage(): MessageInterface
   {
       return $this->getRequest();
   }

   /**
    * Provide invalid method
    */
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
    * Test with request target
    */
   public function testWithRequestTarget()
   {
       $request = $this->getRequest();
       $target = $request->getRequestTarget();
       $this->assertTrue(
           $request
           ->withRequestTarget("target")
           ->getRequestTarget() === "target"
        && $request
           ->getRequestTarget() === $target
       );
   }

   /**
    * Test with method
    */
   public function testWithMethod()
   {
       $request = $this->getRequest();
       $method = $request->getMethod();
       $this->assertTrue(
           $request->withMethod("GET")->getMethod() === "GET"
        && $request->withMethod("POST")->getMethod() === "POST"
        && $request->withMethod("PUT")->getMethod() === "PUT"
        && $request->withMethod("DELETE")->getMethod() === "DELETE"
        && $request->withMethod("OPTIONS")->getMethod() === "OPTIONS"
        && $request->getMethod() === $method
       );
   }

   /**
    * Test with method invalid argument exception
    */
   public function testWithMethodInvalidArgumentException($method)
   {
       $this->getRequest()->withMethod($method);
   }

   /**
    * Test with uri
    */
   public function testWithUri()
   {
       $request = $this->getRequest()->withoutHeader("Host", "foo");
       $uri = (new ReflectionClass(Uri::class))
              ->newInstanceArgs(["http", "bar"]);     
       $this->assertTrue(
           $request
           ->withUri($uri, true)
           ->getHeader("Host")
       === [$uri->getHost("Host")]
        && $request
           ->withUri($uri->withHost("baz"), true)
           ->getHeader("Host")
       !== [$uri->getHost("Host")]
       );
   }

}
