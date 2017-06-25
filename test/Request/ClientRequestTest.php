<?php

/**
 * This file contain Seeren\Http\Test\Request\ClientRequestTest class
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

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\RequestInterface;
use Seeren\Http\Request\ClientRequest;
use Seeren\Http\Stream\ClientRequestStream;
use Seeren\Http\Uri\Uri;
use ReflectionClass;
use Psr\Http\Message\ResponseInterface;

/**
 * Class for test ClientRequest
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request\Test
 */
class ClientRequestTest extends AbstractRequestTest
{

    /**
     * Get RequestInterface
     *
     * @return RequestInterface request
     */
    protected function getRequest(): RequestInterface
    {
        return (new ReflectionClass(ClientRequest::class))
               ->newInstanceArgs([
                   "GET",
                   (new ReflectionClass(Uri::class))
                   ->newInstanceArgs(["http", "host"])
               ]
        );
    }

    /**
     * Get RequestInterface
     *
     * @return RequestInterface request
     */
    protected function getClientRequest(): RequestInterface
    {
        return (new ReflectionClass(ClientRequest::class))
        ->newInstanceArgs([
            "GET",
            (new ReflectionClass(Uri::class))
            ->newInstanceArgs(["https", "github.com"]),
            ["Accept" => "*"],
            (new ReflectionClass(ClientRequestStream::class))
            ->newInstanceArgs([])
        ]);
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
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
     * @covers \Seeren\Http\Request\ClientRequest::getResponse
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Request\ClientRequest::send
     * @covers \Seeren\Http\Response\ClientResponse::__construct
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
     * @covers \Seeren\Http\Stream\Stream::isSeekable
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
     */
    public function testGetResponse()
    {
        $this->assertTrue(
            $this->getClientRequest()
            ->getResponse() instanceof ResponseInterface
        );
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\AbstractRequest::getUri
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withUri
     * @covers \Seeren\Http\Request\ClientRequest::getResponse
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Request\ClientRequest::send
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\ClientResponseStream::__construct
     * @covers \Seeren\Http\Stream\ClientResponseStream::parseContext
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
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
    public function testGetResponseRuntimeException()
    {
        $this->getClientRequest()
        ->withUri(
            (new ReflectionClass(Uri::class))
            ->newInstanceArgs(["https", "invalid host", "invalid target"]))
        ->getResponse();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getProtocolVersion
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withProtocolVersion
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithProtocolVersion()
    {
        parent::testWithProtocolVersion();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::hasHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testHasHeader()
    {
        parent::testHasHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testGetHeader()
    {
        parent::testGetHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testGetHeaderLine()
    {
        parent::testGetHeaderLine();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidHeader
     */
    public function testWithHeaderInvalidArgumentException($value)
    {
        parent::testWithHeaderInvalidArgumentException($value);
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithHeader()
    {
        parent::testWithHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidHeader
     */
    public function testWithAddedHeaderInvalidArgumentException($value)
    {
        parent::testWithAddedHeaderInvalidArgumentException($value);
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withAddedHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithAddedHeader()
    {
        parent::testWithAddedHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Message\AbstractMessage::withoutHeader
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithoutHeader()
    {
        parent::testWithoutHeader();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testGetBody()
    {
        parent::testGetBody();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withBody
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithBody()
    {
        parent::testWithBody();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::withBody
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::close
     * @covers \Seeren\Http\Stream\Stream::detach
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testWithBodyInvalidArgumentException()
    {
        parent::testWithBodyInvalidArgumentException();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getRequestTarget
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withRequestTarget
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getPath
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPath
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithRequestTarget()
    {
        parent::testWithRequestTarget();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithMethod()
    {
        parent::testWithMethod();
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::withMethod
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidMethod
     */
    public function testWithMethodInvalidArgumentException($method)
    {
        parent::testWithMethodInvalidArgumentException($method);
    }

    /**
     * @covers \Seeren\Http\Request\ClientRequest::__construct
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
     * @covers \Seeren\Http\Request\ClientRequest::parseHeader
     * @covers \Seeren\Http\Stream\ClientRequestStream::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::setReadableWritable
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\AbstractUri::parseHost
     * @covers \Seeren\Http\Uri\AbstractUri::parsePath
     * @covers \Seeren\Http\Uri\AbstractUri::parsePort
     * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
     * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withHost
     * @covers \Seeren\Http\Uri\Uri::__construct
     */
    public function testWithUri()
    {
        parent::testWithUri();
    }

}
