<?php

/**
 * This file contain Seeren\Http\Test\Stream\ClientResponseStreamTest class
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

namespace Seeren\Http\Test\Stream;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\ClientResponseStream;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Request\Request;
use Seeren\Http\Uri\Uri;
use ReflectionClass;

/**
 * Class for test ClientResponseStream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream\Test
 * @final
 */
final class ClientResponseStreamTest extends AbstractStreamTest
{

   /**
    * Get StreamInterface
    *
    * @return StreamInterface stream
    */
   protected final function getStream(): StreamInterface
   {
       return (new ReflectionClass(ClientResponseStream::class))
              ->newInstanceArgs([
                  (new ReflectionClass(Request::class))
                  ->newInstanceArgs([
                    (new ReflectionClass(Stream::class))
                    ->newInstanceArgs(["php://temp/", Stream::MODE_R_MORE]),
                    (new ReflectionClass(Uri::class))
                    ->newInstanceArgs( ["https", "github.com"]),
                      "GET",
                      "1.1",
                      ["Accept" => "*"]
                  ])
              ]);
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testToString()
   {
       parent::testToString();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testClose()
   {
       parent::testClose();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::detach
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testDetach()
   {
       parent::testDetach();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::getSize
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testGetSize()
   {
       parent::testGetSize();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::tell
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @expectedException \RuntimeException
    */
   public function testTellRuntimeException()
   {
       parent::testTellRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::eof
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testEof()
   {
       parent::testEof();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testISeekable()
   {
       parent::testISeekable();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isSeekable
    * @covers \Seeren\Http\Stream\Stream::seek
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @expectedException \RuntimeException
    */
   public function testSeekRuntimeException()
   {
       parent::testSeekRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::rewind
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @expectedException \RuntimeException
    */
   public function testRewindRuntimeException()
   {
       parent::testRewindRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::isWritable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Stream\Stream::write
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @expectedException \RuntimeException
    */
   public function testWriteRuntimeException()
   {
       parent::testWriteRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::read
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @expectedException \RuntimeException
    */
   public function testReadRuntimeException()
   {
       parent::testReadRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    * @expectedException \RuntimeException
    */
   public function testGetContentsRuntimeException()
   {
       parent::testGetContentsRuntimeException();
   }

   /**
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__toString
    * @covers \Seeren\Http\Stream\Stream::getContents
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::isReadable
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @covers \Seeren\Http\Uri\AbstractUri::__construct
    * @covers \Seeren\Http\Uri\AbstractUri::__toString
    * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
    * @covers \Seeren\Http\Uri\AbstractUri::parseHost
    * @covers \Seeren\Http\Uri\AbstractUri::parsePath
    * @covers \Seeren\Http\Uri\AbstractUri::parsePort
    * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
    * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
    * @covers \Seeren\Http\Uri\Uri::__construct
    */
   public function testGetMetadata()
   {
       parent::testGetMetadata();
   }

}
