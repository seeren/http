<?php

namespace Seeren\Http\Test\Client;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Seeren\Http\Client\Client;
use Seeren\Http\Client\Exception\NetworkException;
use Seeren\Http\Client\Exception\RequestException;
use Seeren\Http\Request\AbstractRequest;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Uri\Uri;

class ClientTest extends TestCase
{

    /**
     * @covers \Seeren\Http\Client\Client::__construct
     * @covers \Seeren\Http\Client\Client::sendRequest
     * @covers \Seeren\Http\Client\ClientRequest::__construct
     * @covers \Seeren\Http\Client\Exception\ClientException::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\AbstractRequest::getUri
     * @covers \Seeren\Http\Request\RequestTrait::parseMethod
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\AbstractUri::getScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @throws ClientExceptionInterface
     */
    public function testSendRequestRequestException()
    {
        $this->expectException(RequestException::class);
        $request = new RequestNotReadable();
        $client = new Client('GET', $request->getUri());
        $client->sendRequest($request);
    }

    /**
     * @covers \Seeren\Http\Client\Client::__construct
     * @covers \Seeren\Http\Client\Client::sendRequest
     * @covers \Seeren\Http\Client\ClientRequest::__construct
     * @covers \Seeren\Http\Client\ClientTrait::parseHeader
     * @covers \Seeren\Http\Client\Exception\ClientException::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::getProtocolVersion
     * @covers \Seeren\Http\Message\AbstractMessage::with
     * @covers \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
     * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
     * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\AbstractRequest::getUri
     * @covers \Seeren\Http\Request\RequestTrait::parseMethod
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\AbstractUri::getScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @throws ClientExceptionInterface
     */
    public function testSendRequestNetWorkException()
    {
        $this->expectException(NetworkException::class);
        $request = new RequestWithoutPrerequisite();
        $request->getBody()->write('foo=bar');
        $client = new Client('GET', $request->getUri());
        $client->sendRequest($request->withHeader('Accept', '*/*'));
    }

    /**
     * @covers \Seeren\Http\Client\Client::__construct
     * @covers \Seeren\Http\Client\Client::sendRequest
     * @covers \Seeren\Http\Client\ClientRequest::__construct
     * @covers \Seeren\Http\Client\ClientTrait::getResponse
     * @covers \Seeren\Http\Client\ClientTrait::parseHeader
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::getBody
     * @covers \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers \Seeren\Http\Message\AbstractMessage::getProtocolVersion
     * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
     * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
     * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
     * @covers \Seeren\Http\Request\AbstractRequest::__construct
     * @covers \Seeren\Http\Request\AbstractRequest::getMethod
     * @covers \Seeren\Http\Request\AbstractRequest::getUri
     * @covers \Seeren\Http\Request\RequestTrait::parseMethod
     * @covers \Seeren\Http\Response\Response::__construct
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Stream\Stream::__toString
     * @covers \Seeren\Http\Stream\Stream::getContents
     * @covers \Seeren\Http\Stream\Stream::getMetadata
     * @covers \Seeren\Http\Stream\Stream::isReadable
     * @covers \Seeren\Http\Stream\Stream::isSeekable
     * @covers \Seeren\Http\Stream\Stream::isWritable
     * @covers \Seeren\Http\Stream\Stream::rewind
     * @covers \Seeren\Http\Stream\Stream::write
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     * @covers \Seeren\Http\Uri\AbstractUri::getScheme
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @throws ClientExceptionInterface
     */
    public function testSendRequest()
    {
        $client = new Client('GET', new Uri('https', 'github.com'));
        $this->assertNotEmpty((string)$client->sendRequest()->getBody());
    }

}

class RequestNotReadable extends AbstractRequest
{

    public function __construct()
    {
        parent::__construct(
            new Stream('php://temp', Stream::MODE_W),
            new Uri('http', 'host')
        );
    }

}

class RequestWithoutPrerequisite extends AbstractRequest
{

    public function __construct()
    {
        parent::__construct(
            new Stream('php://temp', Stream::MODE_R_MORE),
            new Uri('http', 'host')
        );
    }

}
