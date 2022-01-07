<?php

namespace Seeren\Http\Stream;

use InvalidArgumentException;
use RuntimeException;

class Stream implements StreamInterface
{

    protected $stream;

    protected array $meta;

    public function __construct(string $target, string $mode = self::MODE_R, $context = null)
    {
        if (!$target || !($this->stream = @fopen($target, $mode, false, $context))) {
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

    public final function __toString(): string
    {
        try {
            return $this->getContents();
        } catch (RuntimeException $e) {
            return '';
        }
    }

    public final function close(): void
    {
        fclose($this->stream);
        $this->meta = [
            'size' => null,
            'readable' => false,
            'writable' => false
        ];
    }

    public final function detach()
    {
        if ($this->stream) {
            $this->close();
            $this->stream = null;
        }
        return $this->stream;
    }

    public final function getSize(): ?int
    {
        return $this->getMetadata('size');
    }

    public final function tell(): int
    {
        if (!$this->isSeekable()) {
            throw new RuntimeException('Can\'t tell because stream is not seekable');
        }
        return ftell($this->stream);
    }

    public final function eof(): bool
    {
        return $this->meta['eof'];
    }

    public final function isSeekable(): bool
    {
        return (bool)$this->getMetadata('seekable');
    }

    public final function seek($offset, $whence = SEEK_SET): void
    {
        if (-1 === fseek($this->stream, (int)$offset, (int)$whence)) {
            throw new RuntimeException('Can\'t seek at offset "' . $offset . '"');
        }
    }

    public final function rewind()
    {
        if (!$this->isReadable() || !$this->isSeekable()) {
            throw new RuntimeException('Can\'t rewind because stream is not readable or seekable');
        }
        rewind($this->stream);
        $this->meta['eof'] = false;
    }

    public final function isWritable(): bool
    {
        return $this->getMetadata('writable');
    }

    public final function isReadable(): bool
    {
        return $this->getMetadata('readable');
    }

    public final function write($string): int
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

    public final function read($length): string
    {
        if (!$this->isReadable()) {
            throw new RuntimeException('Can\'t read because stream is not readable');
        }
        $read = (string)fread($this->stream, (int)$length);
        $this->meta['eof'] = true;
        return $read;
    }

    public final function getContents(): string
    {
        if (!$this->isReadable()) {
            throw new RuntimeException('Can\'t getContents because stream is not readable');
        }
        $this->meta['eof'] = true;
        return (string)stream_get_contents($this->stream);
    }

    public final function getMetadata($key = null)
    {
        if (null !== $key) {
            return $this->meta[$key] ?? null;
        }
        return $this->meta;
    }

}
