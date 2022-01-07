<?php

namespace Seeren\Http\Test\Request;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Message\AbstractMessage;
use Seeren\Http\Request\AbstractRequest;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Uri\Uri;

class AbstractRequestTest extends TestCase
{
    
    public function getMock(): object
    {
        return (new ReflectionClass(DummyRequest::class))->newInstance();
    }

    /**
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::getRequestTarget
     * @covers \Seeren\Http\Request\RequestParserTrait::parseMethod
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getPath
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     */
    public function testGetRequestTarget(): void
    {
        $this->assertEquals('/', $this->getMock()->getRequestTarget());
    }

    /**
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::getRequestTarget
     * @covers \Seeren\Http\Request\AbstractRequest::with
     * @covers \Seeren\Http\Request\AbstractRequest::withRequestTarget
     * @covers \Seeren\Http\Request\RequestParserTrait::parseMethod
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getPath
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPath
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     */
    public function testWithRequestTarget(): void
    {
        $this->assertEquals('foo', $this->getMock()->withRequestTarget('foo')->getRequestTarget());
    }

    /**
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\RequestParserTrait::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::with
     * @covers \Seeren\Http\Request\AbstractRequest::withMethod
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     */
    public function testWithMethod(): void
    {
        $this->assertEquals('PATCH', $this->getMock()->withMethod('PATCH')->getMethod());
    }

    /**
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\RequestParserTrait::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::with
     * @covers \Seeren\Http\Request\AbstractRequest::withMethod
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     */
    public function testWithMethodException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withMethod('FOO');
    }

    /**
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::getUri
     * @covers \Seeren\Http\Request\RequestParserTrait::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::with
     * @covers \Seeren\Http\Request\AbstractRequest::withUri
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     */
    public function testWithUri(): void
    {
        $this->assertEquals(
            'foo',
            $this->getMock()->withUri(new Uri('http', 'foo'))->getUri()->getHost()
        );
    }

    /**
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Message\MessageParserTrait::parseHeaderName
     * @covers \Seeren\Http\Message\MessageParserTrait::parseHeaderValue
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Request\RequestParserTrait::parseMethod
     * @covers \Seeren\Http\Request\AbstractRequest::with
     * @covers \Seeren\Http\Request\AbstractRequest::withUri
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     */
    public function testWithUriPreserveHost(): void
    {
        $this->assertEquals(
            'foo',
            $this->getMock()
                ->withUri(new Uri('http', 'foo'), true)
                ->getHeaderLine('Host')
        );
    }

}

class DummyRequest extends AbstractRequest
{

    public function __construct()
    {
        parent::__construct(
            new Stream('php://temp', Stream::MODE_R),
            new Uri('http', 'host')
        );
    }

}
