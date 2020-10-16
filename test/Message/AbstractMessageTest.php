<?php

namespace Seeren\Http\Test\Message;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Message\AbstractMessage;
use Seeren\Http\Stream\Stream;

class AbstractMessageTest extends TestCase
{

    /**
     * @return array
     */
    public function protocolProvider(): array
    {
        return [
            ['1.0'],
            ['1.1'],
            ['2'],
        ];
    }

    /**
     * @param string $protocol
     * @param array $headers
     * @return object
     */
    public function getMock(string $protocol = '1.1', array $headers = []): object
    {
        return (new ReflectionClass(DummyMessage::class))->newInstance($protocol, $headers);
    }

    /**
     * @dataProvider protocolProvider
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::getProtocolVersion
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @param string $protocol
     */
    public function testGetProtocolVersion(string $protocol): void
    {
        $this->assertEquals($protocol, $this->getMock($protocol)->getProtocolVersion());
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::getProtocolVersion
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::withProtocolVersion
     * @covers       \Seeren\Http\Message\AbstractMessage::with
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testWithProtocolVersion(): void
    {
        $this->assertEquals('1.1', $this->getMock()->withProtocolVersion('1.1')->getProtocolVersion());
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaders
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testGetHeaders(): void
    {
        $this->assertCount(1, $this->getMock('1.1', ['Content-Type' => 'application/json'])
            ->getHeaders());
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::hasHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testHasHeaders(): void
    {
        $this->assertTrue($this->getMock('1.1', ['Content-Type' => 'application/json'])
            ->hasHeader('Content-Type'));
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testGetHeader(): void
    {
        $this->assertEquals(
            ['application/json'],
            $this->getMock('1.1', ['Content-Type' => 'application/json'])
                ->getHeader('Content-Type')
        );
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testGetHeaderLine(): void
    {
        $this->assertEquals(
            'application/json',
            $this->getMock('1.1', ['Content-Type' => 'application/json'])
                ->getHeaderLine('Content-Type')
        );
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::with
     * @covers       \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testWithHeader(): void
    {
        $mock = $this->getMock('1.1', ['Content-Type' => 'application/json']);
        $this->assertEquals(
            'application/json',
            $mock->withHeader('Content-Type', 'application/json')->getHeaderLine('Content-Type')
        );
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::withHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testWithHeaderException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withHeader('Content-Type', '');
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::with
     * @covers       \Seeren\Http\Message\AbstractMessage::withAddedHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testWithAddedHeader(): void
    {
        $mock = $this->getMock('1.1', ['Content-Type' => 'application/json']);
        $this->assertEquals(
            'application/json',
            $mock->withAddedHeader('Content-Type', ['application/json'])->getHeaderLine('Content-Type')
        );
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::withAddedHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testWithAddedHeaderException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withAddedHeader('Content-Type', '');
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::with
     * @covers       \Seeren\Http\Message\AbstractMessage::withoutHeader
     * @covers       \Seeren\Http\Stream\Stream::__construct
     */
    public function testWithoutAddedHeader(): void
    {
        $mock = $this->getMock('1.1', ['Content-Type' => 'application/json']);
        $this->assertEquals('', $mock->withoutHeader('Content-Type')->getHeaderLine('Content-Type'));
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::with
     * @covers       \Seeren\Http\Message\AbstractMessage::withBody
     * @covers       \Seeren\Http\Message\AbstractMessage::getBody
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testWithBody(): void
    {
        $mock = $this->getMock();
        $clone = $mock->withBody(new Stream('php://temp', Stream::MODE_W));
        $this->assertTrue($mock->getBody() !== $clone->getBody());
    }

    /**
     * @covers       \Seeren\Http\Message\AbstractMessage::__construct
     * @covers       \Seeren\Http\Message\AbstractMessage::parseProtocol
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderName
     * @covers       \Seeren\Http\Message\AbstractMessage::parseHeaderValue
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeader
     * @covers       \Seeren\Http\Message\AbstractMessage::getHeaderLine
     * @covers       \Seeren\Http\Message\AbstractMessage::with
     * @covers       \Seeren\Http\Message\AbstractMessage::withBody
     * @covers       \Seeren\Http\Message\AbstractMessage::getBody
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::detach
     */
    public function testWithBodyException(): void
    {
        $mock = $this->getMock();
        $body = new Stream('php://temp', Stream::MODE_W);
        $body->detach();
        $this->expectException(InvalidArgumentException::class);
        $mock->withBody($body);
    }

}

class DummyMessage extends AbstractMessage
{

    /**
     * @param string $protocol
     * @param array $headers
     */
    public function __construct(string $protocol = '1.1', array $headers = [])
    {
        parent::__construct($protocol, $headers, new Stream('php://temp', Stream::MODE_W));
    }

}
