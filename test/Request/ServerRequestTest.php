<?php

/**
 * This file contain Seeren\Http\Test\Request\ServerRequestTest class
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

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\ServerRequestInterface;
use Seeren\Http\Request\ServerRequest;
use Seeren\Http\Stream\ServerRequestStream;
use Seeren\Http\Uri\ServerRequestUri;
use ReflectionClass;

/**
 * Class for test ServerRequest
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Request
 */
class ServerRequestTest extends AbstractServerRequestTest
{

    /**
     * Get ServerRequestInterface
     *
     * @return ServerRequestInterface request
     */
    protected function getServerRequest(): ServerRequestInterface
    {
        return (new ReflectionClass(ServerRequest::class))
          ->newInstanceArgs([
                (new ReflectionClass(ServerRequestStream::class))
                ->newInstanceArgs([]),
                (new ReflectionClass(ServerRequestUri::class))
                ->newInstanceArgs([]),
          ]
        );
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getProtocolVersion
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withProtocolVersion
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithProtocolVersion()
    {
        parent::testWithProtocolVersion();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::hasHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testHasHeader()
    {
        parent::testHasHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testGetHeader()
    {
        parent::testGetHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testGetHeaderLine()
    {
        parent::testGetHeaderLine();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidHeader
     */
    public function testWithHeaderInvalidArgumentException($value)
    {
        parent::testWithHeaderInvalidArgumentException($value);
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithHeader()
    {
        parent::testWithHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidHeader
     */
    public function testWithAddedHeaderInvalidArgumentException($value)
    {
        parent::testWithAddedHeaderInvalidArgumentException($value);
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithAddedHeader()
    {
        parent::testWithAddedHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Message\AbstractMessage::withoutHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithoutHeader()
    {
        parent::testWithoutHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testGetBody()
    {
        parent::testGetBody();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withBody
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithBody()
    {
        parent::testWithBody();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::withBody
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::close
     * @covers \Seeren\Http\Stream\Stream::detach
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @expectedException \InvalidArgumentException
     */
    public function testWithBodyInvalidArgumentException()
    {
        parent::testWithBodyInvalidArgumentException();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getRequestTarget
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withRequestTarget
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getPath
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPath
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::getPath
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @covers \Seeren\Http\Uri\ServerRequestUri::withPath
     */
    public function testWithRequestTarget()
    {
        parent::testWithRequestTarget();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithMethod()
    {
        parent::testWithMethod();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidMethod
     */
    public function testWithMethodInvalidArgumentException($method)
    {
        parent::testWithMethodInvalidArgumentException($method);
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Message\AbstractMessage::withoutHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withUri
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withHost
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithUri()
    {
        parent::testWithUri();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::getServerParams
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testGetServerParams()
    {
        parent::testGetServerParams();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::getCookieParams
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withCookieParams
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithCookieParams()
    {
        parent::testWithCookieParams();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::getQueryParams
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withQueryParams
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithQueryParams()
    {
        parent::testWithQueryParams();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::getUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testWithUploadedFiles()
    {
        parent::testWithUploadedFiles();
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withUploadedFiles
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidUploadedFile
     */
    public function testWithUploadedFilesInvalidArgumentException(
        array $uploadedFiles)
    {
        parent::testWithUploadedFilesInvalidArgumentException($uploadedFiles);
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::getParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withParsedBody
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @dataProvider provideParsedBody
     */
    public function testWithParsedBody($body)
    {
        parent::testWithParsedBody($body);
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withParsedBody
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidParsedBody
     */
    public final function testWithParsedBodyInvalidArgumentException($body)
    {
        parent::testWithParsedBodyInvalidArgumentException($body);
    }

    /**
     * @covers \Seeren\Http\Request\ServerRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ServerRequest::getAttribute
     * @covers \Seeren\Http\Request\ServerRequest::getAttributes
     * @covers \Seeren\Http\Request\ServerRequest::parseCookie
     * @covers \Seeren\Http\Request\ServerRequest::parseHeader
     * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
     * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
     * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
     * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
     * @covers \Seeren\Http\Request\ServerRequest::withAttribute
     * @covers \Seeren\Http\Request\ServerRequest::withoutAttribute
     * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Upload\UploadedFile::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
     * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
     */
    public function testAttributes()
    {
        parent::testAttributes();
    }

}
