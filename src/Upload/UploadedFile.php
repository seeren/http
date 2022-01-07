<?php

namespace Seeren\Http\Upload;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\Stream;
use InvalidArgumentException;
use RuntimeException;
use Seeren\Http\Stream\StreamInterface as StreamInterfaceAlias;
use Throwable;

class UploadedFile implements UploadedFileInterface
{

    private ?StreamInterface $body;

    private ?string $name;

    private ?int $size;

    private ?string $type;

    private string $tmpName;

    private int $error;

    public final function __construct(array $file)
    {
        $this->name = $file[self::NAME] ?? null;
        $this->type = $file[self::TYPE] ?? null;
        $this->error = $file[self::ERROR] ?? 0;
        $this->body = null;
        $this->size = null;
        if (array_key_exists(self::TMP, $file)) {
            try {
                $this->tmpName = $file[self::TMP] ?? '';
                $this->body = new Stream($this->tmpName, StreamInterfaceAlias::MODE_R);
                $this->size = (int)$this->body->getSize();
            } catch (InvalidArgumentException $e) {
                $this->error = 4;
            }
        }
    }

    public final function getStream(): StreamInterface
    {
        if (!$this->body) {
            throw new RuntimeException('Can\'t get Stream: resource no found');
        }
        return $this->body;
    }

    public final function moveTo($targetPath)
    {
        $path = str_replace(["/", "\\"], DIRECTORY_SEPARATOR, $targetPath);
        $lastDirPos = strripos($path, DIRECTORY_SEPARATOR);
        $dir = $lastDirPos ? substr($path, 0, $lastDirPos + 1) : null;
        if (!$dir || !is_dir($dir)) {
            throw new InvalidArgumentException("Can't move to: $path");
        }
        try {
            if (false === @file_put_contents($path, (string)$this->getStream())) {
                throw new RuntimeException('Can\'t put content');
            }
        } catch (Throwable $e) {
            throw new RuntimeException('Can\'t move to"' . $path . '":' . $e->getMessage());
        }
        $this->body->detach();
        $this->body = null;
        @unlink($this->tmpName);
    }

    public final function getSize(): ?int
    {
        return $this->size;
    }

    public final function getError(): int
    {
        return $this->error;
    }

    public final function getClientFilename(): ?string
    {
        return $this->name;
    }

    public final function getClientMediaType(): ?string
    {
        return $this->type;
    }

}
