<?php

/**
 * This file contain Seeren\Http\Test\Uri\ServerRequestUriTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.1
 */

namespace Seeren\Http\Test\Uri;

use Psr\Http\Message\UriInterface;
use Seeren\Http\Uri\ServerRequestUri;
use ReflectionClass;

/**
 * Class for test ServerRequestUri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri\Test
 * @final
 */
final class ServerRequestUriTest extends AbstractUriTest
{

   /**
    * Get UriInterface
    *
    * @return UriInterface uri
    */
   protected final function getUri(): UriInterface
   {
       return (new ReflectionClass(ServerRequestUri::class))
       ->newInstanceArgs([])
       ->withScheme("http")
       ->withHost("host")
       ->withPath("path");
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getScheme
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    */
   public function testGetScheme ()
   {
       parent::testGetScheme();
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getScheme
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    */
   public function testGetHttpsScheme ()
   {
       parent::testGetHttpsScheme();
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\AbstractUri::withUserInfo
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @dataProvider provideAutority
    */
   public function testGetAuthority($user, $pwsd, $host, $port, $autority)
   {
       parent::testGetAuthority($user, $pwsd, $host, $port, $autority);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getUserInfo
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\AbstractUri::withUserInfo
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @dataProvider provideAutority
    */
   public function testGetUserInfo($user, $pwsd, $host, $port, $autority)
   {
       parent::testGetUserInfo($user, $pwsd, $host, $port, $autority);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getHost
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    */
   public function testGetHost()
   {
       parent::testGetHost();
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getPort
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    */
   public function testGetPort()
   {
       parent::testGetPort();
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withQuery
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @dataProvider provideRawAndEncodedQuery
    */
   public function testGetQuery($raw, $encoded)
   {
       parent::testGetQuery($raw, $encoded);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getFragment
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withFragment
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    */
   public function testGetFragment()
   {
       $this->assertTrue(
           $this->getUri()
           ->withFragment("fragment")
           ->getFragment() === "fragment"
           );
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidScheme
    */
   public function testWithInvalidScheme($scheme)
   {
       parent::testWithInvalidScheme($scheme);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHost
    */
   public function testWithInvalidHost($host)
   {
       parent::testWithInvalidHost($host);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidPort
    */
   public function testWithInvalidPort($port)
   {
       parent::testWithInvalidPort($port);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvaliPath
    */
   public function testWithInvalidPath($path)
   {
       parent::testWithInvalidPath($path);
   }

   /**
    * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @covers \Seeren\Http\Uri\AbstractUri::withQuery
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
    * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvaliQuery
    */
   public function testWithInvalidQuery($query)
   {
       parent::testWithInvalidQuery($query);
   }

}
