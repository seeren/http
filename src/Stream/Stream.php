<?php

namespace Seeren\Http\Stream;

use InvalidArgumentException;
use RuntimeException;

/**
 * Class to represent a stream
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Stream
 */
class Stream implements StreamInterface
{

    /**
     * @var resource
     */
    protected $stream;

    /**
     * @var array
     */
    protected array $meta;

    /**
     * @param string $target
     * @param string $mode
     * @param resource|null $context
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $target, string $mode = Stream::MODE_R, $context = null)
    {
        if (!($this->stream = @fopen($target, $mode, false, $context))) {
            throw new InvalidArgumentException('Can\'t create Stream for target "' . $target . '"');
        }
        $this->meta = stream_get_meta_data($this->stream);
        if (self::MODE_R === $mode) {
            $this->meta['readable'] = true;
            $this->meta['writable'] = false;
        } else if (self::MODE_W === $mode
            || self::MODE_A === $mode
            || self::MODE_C === $mode
            || self::MODE_X === $mode) {
            $this->meta['readable'] = false;
            $this->meta['writable'] = true;
        } else if (self::MODE_R_MORE === $mode
            || self::MODE_W_MORE === $mode
            || self::MODE_A_MORE === $mode
            || self::MODE_C_MORE === $mode
            || self::MODE_X_MORE === $mode) {
            $this->meta['readable'] = true;
            $this->meta['writable'] = true;
        }
        $this->meta['size'] = ($stat = fstat($this->stream)) && array_key_exists('size', $stat) ? $stat['size'] : null;
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::__toString()
     */
    public function __toString(): string
    {
        try {
            return $this->getContents();
        } catch (RuntimeException $e) {
            return '';
        }
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::close()
     */
    public function close(): void
    {
        fclose($this->stream);
        $this->meta = [
            'size' => null,
            'readable' => false,
            'writable' => false
        ];
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::detach()
     */
    public function detach()
    {
        $stream = null;
        if ($this->stream) {
            $this->close();
            $stream = $this->stream;
            $this->stream = null;
        }
        return $stream;
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::getSize()
     */
    public function getSize(): ?int
    {
        return $this->getMetadata('size');
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::tell()
     */
    public function tell(): int
    {
        if (!$this->isSeekable()) {
            throw new RuntimeException('Can\'t tell because stream is not seekable');
        }
        return ftell($this->stream);
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::eof()
     */
    public function eof(): bool
    {
        return $this->meta['eof'];
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::isSeekable()
     */
    public function isSeekable(): bool
    {
        return (bool)$this->getMetadata('seekable');
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::seek()
     */
    public function seek($offset, $whence = SEEK_SET): void
    {
        if (!$this->isSeekable() || -1 === fseek($this->stream, (int)$offset, (int)$whence)) {
            throw new RuntimeException('Can\'t seek at offset "' . $offset . '"');
        }
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::rewind()
     */
    public function rewind()
    {
        if (!$this->isReadable() || !$this->isSeekable()) {
            throw new RuntimeException('Can\'t rewind because stream is not readable or seekable');
        }
        rewind($this->stream);
        $this->meta['eof'] = false;
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::isWritable()
     */
    public function isWritable(): bool
    {
        return $this->getMetadata('writable');
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::isReadable()
     */
    public function isReadable(): bool
    {
        return $this->getMetadata('readable');
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::write()
     */
    public function write($string): int
    {
        if (!$this->isWritable()) {
            throw new RuntimeException('Can\'t write because stream is not writable');
        }
        $this->meta['eof'] = true;
        if (($size = (int)fwrite($this->stream, (string)$string))) {
            $this->meta['size'] = $this->getMetadata('size') + $size;
        }
        return $size;
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::read()
     */
    public function read($length): string
    {
        if (!$this->isReadable()) {
            throw new RuntimeException('Can\'t read because stream is not readable');
        }
        $read = (string)fread($this->stream, (int)$length);
        $this->meta['eof'] = true;
        return $read;
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::getContents()
     */
    public function getContents(): string
    {
        if (!$this->isReadable()) {
            throw new RuntimeException('Can\'t getContents because stream is not readable');
        }
        $this->meta['eof'] = true;
        return (string)stream_get_contents($this->stream);
    }

    /**
     * {@inheritDoc}
     * @see StreamInterface::getMetadata()
     */
    public function getMetadata($key = null)
    {
        if (null !== $key) {
            return $this->meta[$key] ?? null;
        }
        return $this->meta;
    }

}
