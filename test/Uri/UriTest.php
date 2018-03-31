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
 * @version 1.0.2
 */

namespace Seeren\Http\Test\Uri;

use Psr\Http\Message\UriInterface;
use Seeren\Http\Uri\Uri;
use ReflectionClass;

/**
 * Class for test Uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Uri
 * @final
 */
final class UriTest extends AbstractUriTest
{

   /**
    * {@inheritDoc}
    * @see \Seeren\Http\Test\Uri\AbstractUriTest::getUri()
    */
   protected final function getUri(): UriInterface
   {
       return (new ReflectionClass(Uri::class))
       ->newInstanceArgs( ["http", "host", "path"]);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getScheme
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    */
   public function testGetScheme ()
   {
       parent::testGetScheme();
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getScheme
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    */
   public function testGetHttpsScheme ()
   {
       parent::testGetHttpsScheme();
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @covers \Seeren\Http\Uri\AbstractUri::withUserInfo
    * @dataProvider provideAutority
    */
   public function testGetAuthority($user, $pwsd, $host, $port, $autority)
   {
       parent::testGetAuthority($user, $pwsd, $host, $port, $autority);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getUserInfo
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @covers \Seeren\Http\Uri\AbstractUri::withUserInfo
    * @dataProvider provideAutority
    */
   public function testGetUserInfo($user, $pwsd, $host, $port)
   {
       parent::testGetUserInfo($user, $pwsd, $host, $port);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getHost
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    */
   public function testGetHost()
   {
       parent::testGetHost();
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getPort
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    */
   public function testGetPort()
   {
       parent::testGetPort();
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withQuery
    * @dataProvider provideRawAndEncodedQuery
    */
   public function testGetQuery($raw, $encoded)
   {
       parent::testGetQuery($raw, $encoded);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::getFragment
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withFragment
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
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::withScheme
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidScheme
    */
   public function testWithInvalidScheme($scheme)
   {
       parent::testWithInvalidScheme($scheme);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::withHost
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHost
    */
   public function testWithInvalidHost($host)
   {
       parent::testWithInvalidHost($host);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::withPort
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidPort
    */
   public function testWithInvalidPort($port)
   {
       parent::testWithInvalidPort($port);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvaliPath
    */
   public function testWithInvalidPath($path)
   {
       parent::testWithInvalidPath($path);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::withQuery
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvaliQuery
    */
   public function testWithInvalidQuery($query)
   {
       parent::testWithInvalidQuery($query);
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withPath
    */
   public function testToString()
   {
       $this->assertTrue((string)
           $this->getUri()
           ->withPath("file.php") === "http://host/file.php");
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withFragment
    */
   public function testToStringWithoutPathAndWithFragment()
   {
       $uri = $this->getUri();
       $uri->__construct("http", "host");
       $this->assertTrue((string)
           $uri
           ->withFragment("fragment") === "http://host/#fragment");
   }

   /**
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\AbstractUri::with
    * @covers \Seeren\Http\Uri\AbstractUri::withQuery
    */
   public function testToStringWithoutPathAndWithQuery()
   {
       $uri = $this->getUri();
       $uri->__construct("http", "host");
       $this->assertTrue((string)
           $uri
           ->withQuery("key=value") === "http://host/?key=value");
   }

}
