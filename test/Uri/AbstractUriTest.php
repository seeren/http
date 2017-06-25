<?php

/**
 * This file contain Seeren\Http\Test\Uri\AbstractUriTest class
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

namespace Seeren\Http\Test\Uri;

use Psr\Http\Message\UriInterface;

/**
 * Class for test AbstractUri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Uri
 * @abstract
 */
abstract class AbstractUriTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get UriInterface
    *
    * @return UriInterface uri
    */
   abstract protected function getUri(): UriInterface;

   /**
    * Provide authority
    */
   public final function provideAutority()
   {
       return [
           ["", null, "host", 80, "host:80"],
           ["user", null, "host", 80, "user@host:80"],
           ["user", "password", "host", 80, "user:password@host:80"],
       ];
   }

    /**
     * Provide raw and encoded query string
     */
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
    * Provide invalid scheme
    */
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
     * Provide invalid host
     */
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
     * Provide invalid port
     */
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
     * Provide invalid path
     */
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
     * Provide invalid query
     */
    public final function provideInvaliQuery()
    {
       return [
           [null],
           [0],
           [true],
           [[]]
       ];
    }

   /**
    * Test get scheme
    */
   public function testGetScheme ()
   {
       $this->assertTrue(
           $this->getUri()
           ->getScheme() === "http");
   }

   /**
    * Test get https scheme
    */
   public function testGetHttpsScheme ()
   {
       $this->assertTrue(
           $this->getUri()
           ->withScheme("https")
           ->getScheme() === "https");
   }

   /**
    * Test get authority
    */
   public function testGetAuthority($user, $pwsd, $host, $port, $autority)
   {
       $this->assertTrue(
           $this->getUri()
           ->withUserInfo($user, $pwsd)
           ->withHost($host)
           ->withPort($port)
           ->getAuthority() === $autority );
   }

   /**
    * Test get user info
    */
   public function testGetUserInfo($user, $pwsd, $host, $port, $autority)
   {
       $userInfo = $user . ($pwsd ? ":" . $pwsd : "");
       $this->assertTrue(
           $this->getUri()
           ->withUserInfo($user, $pwsd)
           ->withHost($host)
           ->withPort($port)
           ->getUserInfo() === $userInfo );
   }

   /**
    * Test get host
    */
   public function testGetHost()
   {
       $this->assertTrue(
           $this->getUri()
           ->withHost("host")
           ->getHost() === "host");
   }

   /**
    * Test get host
    */
   public function testGetPort()
   {
       $this->assertTrue(
           $this->getUri()
           ->withPort(80)
           ->getPort() === 80);
   }

   /**
    * Test get query string
    */
   public function testGetQuery($raw, $encoded)
   {
       $this->assertTrue(
           $this->getUri()
           ->withQuery($raw)
           ->getQuery()
       === $this->getUri()
           ->withQuery($encoded)
           ->getQuery()
       );
   }

   /**
    * Test with invalid scheme
    */
   public function testWithInvalidScheme($scheme)
   {
       $this->getUri()->withScheme($scheme);
   }

   /**
    * Test with invalid host
    */
   public function testWithInvalidHost($host)
   {
       $this->getUri()->withHost($host);
   }

   /**
    * Test uri with invalid port
    */
   public function testWithInvalidPort($port)
   {
       $this->getUri()->withPort($port);
   }

   /**
    * Test with invalid path
    */
   public function testWithInvalidPath($path)
   {
       $this->getUri()->withPath($path);
   }

   /**
    * Test with invalid query
    */
   public function testWithInvalidQuery($query)
   {
       $this->getUri()->withQuery($query);
   }

}
