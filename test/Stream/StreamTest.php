<?php

namespace Seeren\Http\Test\Stream;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use RuntimeException;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Stream\StreamInterface;

class StreamTest extends TestCase
{

    public function writeModes(): array
    {
        return [
            [StreamInterface::MODE_W],
            [StreamInterface::MODE_A],
            [StreamInterface::MODE_C],
            [StreamInterface::MODE_X],
            [StreamInterface::MODE_W],
        ];
    }

    public function composerPath(): array
    {
        return [[__DIR__ . '/../../composer.json']];
    }

    public function fooPath(): array
    {
        return [[__DIR__ . '/foo']];
    }

    public function getMock(string $path, string $mode = Stream::MODE_R): object
    {
        return (new ReflectionClass(Stream::class))->newInstanceArgs([$path, $mode]);
    }

    /**
     * @dataProvider writeModes
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testModeWrite(string $mode): void
    {
        $path = $this->fooPath()[0][0];
        $mock = $this->getMock($path, $mode);
        unlink($path);
        $this->assertTrue(true === $mock->getMetadata('writable')
            && false === $mock->getMetadata('readable'));
    }

    /**
     * @dataProvider fooPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testModeMore(string $path): void
    {
        $mock = $this->getMock($path, StreamInterface::MODE_X_MORE);
        unlink($path);
        $this->assertTrue(true === $mock->getMetadata('writable')
            && true === $mock->getMetadata('readable'));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testToString(string $composerPath): void
    {
        $this->assertTrue('' !== (string)$this->getMock($composerPath));
    }

    /**
     * @dataProvider fooPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testToStringNotFound(string $path): void
    {
        $mock = $this->getMock($path, StreamInterface::MODE_W);
        $content = (string)$mock;
        unlink($path);
        $this->assertTrue('' === $content);
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testClose(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $mock->close();
        $this->assertTrue('' === (string)$mock);
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::detach
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testDetach(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $mock->detach();
        $this->assertFalse($mock->isReadable());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getSize
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testGetSize(string $composerPath): void
    {
        $this->assertTrue(0 < $this->getMock($composerPath)->getSize());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::tell
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testTell(string $composerPath): void
    {
        $this->assertIsInt($this->getMock($composerPath)->tell());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::tell
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testTellException(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $mock->close();
        $this->expectException(RuntimeException::class);
        $mock->tell();
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::eof
     */
    public function testEof(string $composerPath): void
    {
        $this->assertIsBool($this->getMock($composerPath)->eof());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testIsSeekable(string $composerPath): void
    {
        $this->assertIsBool($this->getMock($composerPath)->isSeekable());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::seek
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testSeek(string $composerPath): void
    {
        $this->assertNull($this->getMock($composerPath)->seek(1));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::seek
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testSeekException(string $composerPath): void
    {
        $this->expectException(RuntimeException::class);
        $this->assertIsBool($this->getMock($composerPath)->seek(-1));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::rewind
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testRewind(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $content = (string)$mock;
        $mock->rewind();
        $this->assertEquals($content, (string)$mock);
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::rewind
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::isSeekable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testRewindException(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $mock->close();
        $this->expectException(RuntimeException::class);
        $mock->rewind();
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::isWritable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testIsWritable(string $composerPath): void
    {
        $this->assertIsBool($this->getMock($composerPath)->isWritable());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testIsReadable(string $composerPath): void
    {
        $this->assertIsBool($this->getMock($composerPath)->isReadable());
    }

    /**
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::write
     * @covers       \Seeren\Http\Stream\Stream::isWritable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testWrite(): void
    {
        $path = __DIR__ . '/tmp';
        $mock = $this->getMock($path, StreamInterface::MODE_W_MORE);
        $size = $mock->write('foo');
        unlink($path);
        $this->assertIsInt($size);
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::write
     * @covers       \Seeren\Http\Stream\Stream::isWritable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testWriteException(string $composerPath): void
    {
        $this->expectException(RuntimeException::class);
        $this->assertIsString($this->getMock($composerPath)->write('foo'));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::read
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testRead(string $composerPath): void
    {
        $this->assertIsString($this->getMock($composerPath)->read(1));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::read
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testReadException(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $mock->close();
        $this->expectException(RuntimeException::class);
        $this->assertIsString($mock->read(1));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testGetContents(string $composerPath): void
    {
        $this->assertIsString($this->getMock($composerPath)->getContents());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testGetContentsException(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $mock->close();
        $this->expectException(RuntimeException::class);
        $this->assertIsString($mock->getContents());
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     */
    public function testGetMetadata(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $this->assertTrue(is_bool($mock->getMetadata('readable')) && is_array($mock->getMetadata()));
    }

}
