<?php

namespace Seeren\Http\Test\Upload;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use RuntimeException;
use Seeren\Http\Stream\StreamInterface;
use Seeren\Http\Upload\UploadedFile;

class UploadedFileTest extends TestCase
{

    /**
     * @param array|null $file
     * @return object
     */
    public function getMock(array $file = null): object
    {
        $filename = __DIR__ . DIRECTORY_SEPARATOR . "file-mock";
        file_put_contents($filename, "Mock");
        return (new ReflectionClass(UploadedFile::class))->newInstance(null !== $file
            ? $file
            : [
                UploadedFile::ERROR => 0,
                UploadedFile::NAME => 'dummy',
                UploadedFile::SIZE => null,
                UploadedFile::TMP => $filename,
            ]);
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getError
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testStreamNotFound(): void
    {
        $mock = $this->getMock([UploadedFile::TMP => 'not/found']);
        $this->assertEquals(4, $mock->getError());
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getStream
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testGetStream(): void
    {
        $this->assertInstanceOf(StreamInterface::class, $this->getMock()->getStream());
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getStream
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testGetStreamException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->getMock([])->getStream();
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getSize
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testGetSize(): void
    {
        $this->assertIsInt($this->getMock()->getSize());
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getError
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testGetError(): void
    {
        $this->assertIsInt($this->getMock()->getError());
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getClientFilename
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testClientFilename(): void
    {
        $this->assertEquals('dummy', $this->getMock()->getClientFilename());
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::getClientMediaType
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testClientMediaType(): void
    {
        $this->assertNull($this->getMock()->getClientMediaType());
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::moveTo
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     */
    public function testMoveToInvalidArgumentException(): void
    {
        $mock = $this->getMock();
        $this->expectException(InvalidArgumentException::class);
        $mock->moveTo(__DIR__ . '/not/found');
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::moveTo
     * @covers       \Seeren\Http\Upload\UploadedFile::getStream
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::detach
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     */
    public function testMove(): void
    {
        $path = __DIR__ . '/moved';
        $mock = $this->getMock();
        $mock->moveTo($path);
        $isFile = is_file($path);
        unlink($path);
        $this->assertTrue($isFile);
    }

    /**
     * @covers       \Seeren\Http\Upload\UploadedFile::__construct
     * @covers       \Seeren\Http\Upload\UploadedFile::moveTo
     * @covers       \Seeren\Http\Upload\UploadedFile::getStream
     * @covers       \Seeren\Http\Stream\Stream::__construct
     * @covers       \Seeren\Http\Stream\Stream::getMetadata
     * @covers       \Seeren\Http\Stream\Stream::getSize
     * @covers       \Seeren\Http\Stream\Stream::__toString
     * @covers       \Seeren\Http\Stream\Stream::close
     * @covers       \Seeren\Http\Stream\Stream::detach
     * @covers       \Seeren\Http\Stream\Stream::getContents
     * @covers       \Seeren\Http\Stream\Stream::isReadable
     */
    public function testMoveRuntimeException(): void
    {
        $path = __DIR__ . '/moved';
        $mock = $this->getMock();
        $mock->moveTo($path);
        unlink($path);
        $this->expectException(RuntimeException::class);
        $mock->moveTo($path);
    }

}
