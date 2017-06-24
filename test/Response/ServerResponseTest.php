<?php

/**
 * This file contain Seeren\Http\Test\Response\ServerResponseTest class
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
use Seeren\Http\Response\ServerResponse;
use Seeren\Http\Response\Response;
use Seeren\Http\Stream\ServerResponseStream;
use ReflectionClass;

/**
 * Class for test ServerResponse
 * 
 * @category Seeren
 * @package Http
 * @subpackage Response\Test
 * @final
 */
final class ServerResponseTest extends AbstractResponseTest
{

   /**
    * Get ResponseInterface
    *
    * @return ResponseInterface response
    */
   protected function getResponse(): ResponseInterface
   {
       return (new ReflectionClass(ServerResponse::class))
              ->newInstanceArgs([
                    (new ReflectionClass(ServerResponseStream::class))
                    ->newInstanceArgs([])
              ]);
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getProtocolVersion
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withProtocolVersion
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithProtocolVersion()
   {
       parent::testWithProtocolVersion();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::hasHeader
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testHasHeader()
   {
       parent::testHasHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeader
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetHeader()
   {
       parent::testGetHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaderLine
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetHeaderLine()
   {
       parent::testGetHeaderLine();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHeader
    */
   public function testWithHeaderInvalidArgumentException($value)
   {
       parent::testWithHeaderInvalidArgumentException($value);
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithHeader()
   {
       parent::testWithHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidHeader
    */
   public function testWithAddedHeaderInvalidArgumentException($value)
   {
       parent::testWithAddedHeaderInvalidArgumentException($value);
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithAddedHeader()
   {
       parent::testWithAddedHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
    * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withHeader
    * @covers \Seeren\Http\Message\AbstractMessage::withoutHeader
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithoutHeader()
   {
       parent::testWithoutHeader();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetBody()
   {
       parent::testGetBody();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::getBody
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Message\AbstractMessage::withBody
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::getMetadata
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testWithBody()
   {
       parent::testWithBody();
   }

   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::withBody
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
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
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Response\Response::withStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    * @expectedException \InvalidArgumentException
    * @dataProvider provideInvalidCode
    */
   public function testWithStatus($code)
   {
       parent::testWithStatus($code);
   }
   
   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Response\Response::getStatusCode
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Response\Response::withStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetStatusCode()
   {
       parent::testGetStatusCode();
   }
   
   /**
    * @covers \Seeren\Http\Response\ServerResponse::__construct
    * @covers \Seeren\Http\Response\Response::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::__construct
    * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
    * @covers \Seeren\Http\Message\AbstractMessage::with
    * @covers \Seeren\Http\Response\Response::getReasonPhrase
    * @covers \Seeren\Http\Response\Response::setStatus
    * @covers \Seeren\Http\Response\Response::withStatus
    * @covers \Seeren\Http\Stream\ServerResponseStream::__construct
    * @covers \Seeren\Http\Stream\Stream::__construct
    * @covers \Seeren\Http\Stream\Stream::setReadableWritable
    */
   public function testGetReasonPhrase()
   {
       parent::testGetReasonPhrase();
   }
    
}
