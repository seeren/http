<?php

namespace Seeren\Http\Test\Response;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Response\Response;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Stream\StreamInterface;

class ResponseTest extends TestCase
{

    public function getMock(): object
    {
        return (new ReflectionClass(Response::class))
            ->newInstance(
                (new ReflectionClass(Stream::class))
                    ->newInstance('php://temp', StreamInterface::MODE_W),
                [],
                '1.1'
            );
    }

    /**
     * @covers \Seeren\Http\Response\Response::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Response\Response::getStatusCode
     */
    public function testGetStatusCode(): void
    {
        $this->assertEquals(200, $this->getMock()->getStatusCode());
    }

    /**
     * @covers \Seeren\Http\Response\Response::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Response\Response::withStatus
     * @covers \Seeren\Http\Response\Response::with
     * @covers \Seeren\Http\Response\Response::getStatusCode
     */
    public function testWithStatus(): void
    {
        $clone = $this->getMock()->withStatus(500);
        $this->assertEquals(500, $clone->getStatusCode());
    }

    /**
     * @covers \Seeren\Http\Response\Response::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Response\Response::withStatus
     * @covers \Seeren\Http\Response\Response::with
     * @covers \Seeren\Http\Response\Response::getStatusCode
     */
    public function testWithStatusException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withStatus(0);
    }

    /**
     * @covers \Seeren\Http\Response\Response::__construct
     * @covers \Seeren\Http\Message\AbstractMessage::__construct
     * @covers \Seeren\Http\Message\MessageParserTrait::parseProtocol
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Stream\Stream::__construct
     * @covers \Seeren\Http\Response\Response::setStatus
     * @covers \Seeren\Http\Response\Response::getReasonPhrase
     */
    public function testGetReasonPhrase(): void
    {
        $this->assertEquals('OK', $this->getMock()->getReasonPhrase('OK'));
    }

}
