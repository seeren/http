<?php

namespace Seeren\Http\Test\Stream;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Stream\ResponseStream;
use Seeren\Http\Stream\Stream;

class ResponseStreamTest extends TestCase
{

    public function getMock(): object
    {
        return (new ReflectionClass(ResponseStream::class))->newInstance();
    }

    /**
     * @covers       \Seeren\Http\Stream\ResponseStream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testModeWrite(): void
    {
        $this->assertTrue($this->getMock()->getMetadata('writable'));
    }

}
