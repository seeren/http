<?php

/**
 * This file contain Seeren\Http\Test\Uri\UriInterfaceTest class
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

namespace Seeren\Http\Test\Uri;

use Psr\Http\Message\UriInterface;

/**
 * Class for test UriInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri\Test
 * @abstract
 */
abstract class UriInterfaceTest extends \PHPUnit_Framework_TestCase
{

   /**
    * Get UriInterface
    *
    * @return UriInterface uri
    */
   abstract protected function getUri(): UriInterface;

   /**
    * Test UriInterface::Authority
    * @dataProvider provideAutority
    *
    */
   public final function testAuthority($user, $pwsd, $host, $port, $autority)
   {
       $uri = $this->getUri()
                   ->withUserInfo($user, $pwsd)
                   ->withHost($host)
                   ->withPort($port);
       $this->assertTrue($uri->getAuthority() === $autority );
   }

   public final function provideAutority()
   {
       return [
           ["", null, "host", 80, "host:80"],
           ["user", null, "host", 80, "user@host:80"],
           ["user", "password", "host", 80, "user:password@host:80"],
       ];
   }

   /**
    * Test query string
    * @dataProvider provideRawAndEncodedQuery
    *
    */
   public final function testQuery($raw, $encoded)
   {
       $uri = $this->getUri();
       $this->assertTrue(
           $uri->withQuery($raw)->getQuery()
       === $uri->withQuery($encoded)->getQuery()
       );
   }

   public final function provideRawAndEncodedQuery()
   {
       return [
           ["foo=/", "foo=%2F"],
           ["foo=%2F", "foo=%2F"],
           ["foo=/=", "foo=%2F%3D"],
           ["foo=%2F%3D", "foo=%2F%3D"],
       ];
   }

   /**
    * Test UriInterface::withScheme
    * 
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidScheme
    */
   public final function testWithScheme($scheme)
   {
       $this->getUri()->withScheme($scheme);
   }

   public final function provideInvalidScheme()
   {
       return [
           [null],
           [0],
           [true],
           [[]],
           [""],
           ["invalid scheme"]
       ];
   }

   /**
    * Test UriInterface::withUserInfo
    */
   public final function testWithUserInfo()
   {
       $mock = $this->getUri();
       $this->assertTrue(
           "user" === $mock->withUserInfo("user")
                           ->getUserInfo(),
           "user:password" === $mock->withUserInfo("user", "password")
                                    ->getUserInfo()
       );
   }

   /**
    * Test UriInterface::withHost
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHost
    */
   public final function testWithHost($host)
   {
       $this->getUri()->withHost($host);
   }

   public final function provideInvalidHost()
   {
       return [
          [null],
          [1],
          [true],
          [[]],
          [""],
          ["invalid host"]
       ];
   }

   /**
    * Test UriInterface::withPort
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidPort
    */
   public final function testWithPort($port)
   {
       $this->getUri()->withPort($port);
   }

   public final function provideInvalidPort()
   {
       return [
           [null],
           [0],
           [true],
           [[]],
           [""],
           [63738]
       ];
   }

   /**
    * Test UriInterface::withPath
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvaliPath
    */
   public final function testWithPath($path)
   {
       $this->getUri()->withPath($path);
   }

   public final function provideInvaliPath()
   {
       return [
           [null],
           [0],
           [true],
           [[]],
           [""],
           ["invalid path"]
       ];
   }

   /**
    * Test UriInterface::withQuery
    *
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvaliQuery
    */
   public final function testWithQuery($query)
   {
       $this->getUri()->withQuery($query);
   }
    
   public final function provideInvaliQuery()
   {
       return [
           [null],
           [0],
           [true],
           [[]]
       ];
   }

}
