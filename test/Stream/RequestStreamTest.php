<?php

namespace Seeren\Http\Test\Stream;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Stream\RequestStream;
use Seeren\Http\Stream\Stream;

class RequestStreamTest extends TestCase
{

    public function getMock(): object
    {
        return (new ReflectionClass(RequestStream::class))->newInstance();
    }

    /**
     * @covers       \Seeren\Http\Stream\RequestStream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::isWritable
     * @covers       \Seeren\Http\Stream\Stream::rewind
     * @covers       \Seeren\Http\Stream\Stream::write
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testModeWrite(): void
    {
        $this->assertTrue($this->getMock()->getMetadata('readable'));
    }

}
