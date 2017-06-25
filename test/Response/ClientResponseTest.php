<?php

/**
 * This file contain Seeren\Http\Test\Response\ClientResponseTest class
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

namespace Seeren\Http\Test\Response;

use Psr\Http\Message\ResponseInterface;
use Seeren\Http\Response\ClientResponse;
use Seeren\Http\Stream\ClientRequestStream;
use Seeren\Http\Stream\ClientResponseStream;
use Seeren\Http\Request\Request;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Uri\Uri;
use ReflectionClass;

/**
 * Class for test ClientResponse
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response\Test
 * @final
 */
final class ClientResponseTest extends AbstractResponseTest
{

   /**
    * Get ResponseInterface
    *
    * @return ResponseInterface response
    */
   protected function getResponse(): ResponseInterface
   {
       return (new ReflectionClass(ClientResponse::class))
              ->newInstanceArgs([
                    (new ReflectionClass(ClientRequestStream::class))
                    ->newInstanceArgs([])
              ]);
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Request\AbstractRequest::__construct
    * @covers \Seeren\Http\Request\AbstractRequest::getMethod
    * @covers \Seeren\Http\Request\AbstractRequest::getUri
    * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
    * @covers \Seeren\Http\Request\Request::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
    * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
    * @covers \Seeren\Http\Stream\Stream::__construct
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
   public final function testWrapperDataAdapter()
   {
       $message = $this->getResponse();
       $message->__construct(
           (new ReflectionClass(ClientResponseStream::class))
           ->newInstanceArgs([
               (new ReflectionClass(Request::class))
               ->newInstanceArgs([
                   (new ReflectionClass(Stream::class))
                   ->newInstanceArgs(["php://temp/", Stream::MODE_R_MORE]),
                   (new ReflectionClass(Uri::class))
                   ->newInstanceArgs(["https", "github.com"]),
                   "GET",
                   "1.1",
                   ["Accept" => "*"]
               ])
           ]));
       $this->assertTrue(
           is_array($message->getBody()->getMetadata("wrapper_data"))
       );
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getProtocolVersion
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withProtocolVersion
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithProtocolVersion()
   {
       parent::testWithProtocolVersion();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::hasHeader
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testHasHeader()
   {
       parent::testHasHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeader
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetHeader()
   {
       parent::testGetHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaderLine
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetHeaderLine()
   {
       parent::testGetHeaderLine();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHeader
    */
   public function testWithHeaderInvalidArgumentException($value)
   {
       parent::testWithHeaderInvalidArgumentException($value);
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithHeader()
   {
       parent::testWithHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHeader
    */
   public function testWithAddedHeaderInvalidArgumentException($value)
   {
       parent::testWithAddedHeaderInvalidArgumentException($value);
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithAddedHeader()
   {
       parent::testWithAddedHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Message\AbstractMessage::withoutHeader
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithoutHeader()
   {
       parent::testWithoutHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetBody()
   {
       parent::testGetBody();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withBody
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithBody()
   {
       parent::testWithBody();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::withBody
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::close
    * @covers \Seeren\Http\Stream\Stream::detach
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    */
   public function testWithBodyInvalidArgumentException()
   {
       parent::testWithBodyInvalidArgumentException();
   }

   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Response\Response::withStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidCode
    */
   public function testWithStatus($code)
   {
       parent::testWithStatus($code);
   }
   
   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::getStatusCode
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Response\Response::withStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetStatusCode()
   {
       parent::testGetStatusCode();
   }
   
   /**
    * @covers \Seeren\Http\Response\ClientResponse::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Response\Response::getReasonPhrase
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Response\Response::withStatus
    * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetReasonPhrase()
   {
       parent::testGetReasonPhrase();
   }
    
}
