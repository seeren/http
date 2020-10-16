<?php

namespace Seeren\Http\Test\Stream;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use RuntimeException;
use Seeren\Http\Stream\Stream;

class StreamTest extends TestCase
{

    /**
     * @return string[][]
     */
    public function writeModes(): array
    {
        return [
            [Stream::MODE_W],
            [Stream::MODE_A],
            [Stream::MODE_C],
            [Stream::MODE_X],
            [Stream::MODE_W],
        ];
    }

    /**
     * @return string[][]
     */
    public function composerPath(): array
    {
        return [[__DIR__ . '/../../composer.json']];
    }

    /**
     * @return string[][]
     */
    public function fooPath(): array
    {
        return [[__DIR__ . '/foo']];
    }

    /**
     * @param string $path
     * @param string $mode
     * @return object
     */
    public function getMock(string $path, string $mode = Stream::MODE_R): object
    {
        return (new ReflectionClass(Stream::class))->newInstanceArgs([$path, $mode]);
    }

    /**
     * @dataProvider writeModes
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @param string $mode
     */
    public function testModeWrite(string $mode): void
    {
        $path = $this->fooPath()[0][0];
        $mock = $this->getMock($path, $mode);
        unlink($path);
        $this->assertTrue(true === $mock->getMetadata('writable') && false === $mock->getMetadata('readable'));
    }

    /**
     * @dataProvider fooPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @param string $path
     */
    public function testModeMore(string $path): void
    {
        $mock = $this->getMock($path, Stream::MODE_X_MORE);
        unlink($path);
        $this->assertTrue(true === $mock->getMetadata('writable') && true === $mock->getMetadata('readable'));
    }

    /**
     * @dataProvider composerPath
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @param string $composerPath
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
        $mock = $this->getMock($path, Stream::MODE_W);
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
     */
    public function testSeek(string $composerPath): void
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
        $mock = $this->getMock($path, Stream::MODE_W_MORE);
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
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
     * @param string $composerPath
     */
    public function testGetMetadata(string $composerPath): void
    {
        $mock = $this->getMock($composerPath);
        $this->assertTrue(is_bool($mock->getMetadata('readable')) && is_array($mock->getMetadata()));
    }

}
