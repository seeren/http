<?php

namespace Seeren\Http\Upload;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Stream\Stream;
use InvalidArgumentException;
use RuntimeException;
use Throwable;

/**
 * Class to represent a uploaded file
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Upload
 */
class UploadedFile implements UploadedFileInterface
{

    /**
     * @var StreamInterface|null
     */
    private ?StreamInterface $body;

    /**
     * @var string|null
     */
    private ?string $name;

    /**
     * @var int|null
     */
    private ?int $size;

    /**
     * @var string|null
     */
    private ?string $type;

    /**
     * @var string
     */
    private string $tmpName;

    /**
     * @var int
     */
    private int $error;

    /**
     * @param array $file
     */
    public function __construct(array $file)
    {
        $this->name = $file[self::NAME] ?? null;
        $this->type = $file[self::TYPE] ?? null;
        $this->error = $file[self::ERROR] ?? 0;
        $this->body = null;
        $this->size = null;
        if (array_key_exists(self::TMP, $file)) {
            try {
                $this->tmpName = $file[self::TMP] ?? '';
                $this->body = new Stream($this->tmpName, Stream::MODE_R);
                $this->size = (int)$this->body->getSize();
            } catch (InvalidArgumentException $e) {
                $this->error = 4;
            }
        }
    }

    /**
     * {@inheritDoc}
     * @see UploadedFileInterface::getStream()
     */
    public function getStream(): StreamInterface
    {
        if (!$this->body) {
            throw new RuntimeException("Can't get Stream: resource no found");
        }
        return $this->body;
    }

    /**
     * {@inheritDoc}
     * @see UploadedFileInterface::moveTo()
     */
    public function moveTo($targetPath)
    {
        $path = str_replace(["/", "\\"], DIRECTORY_SEPARATOR, $targetPath);
        $lastDirPos = strripos($path, DIRECTORY_SEPARATOR);
        $dir = $lastDirPos ? substr($path, 0, $lastDirPos + 1) : null;
        if (!$dir || !is_dir($dir)) {
            throw new InvalidArgumentException("Can't move to: " . $path);
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

    /**
     * {@inheritDoc}
     * @see UploadedFileInterface::getSize()
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * {@inheritDoc}
     * @see UploadedFileInterface::getError()
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * {@inheritDoc}
     * @see UploadedFileInterface::getClientFilename()
     */
    public function getClientFilename(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     * @see UploadedFileInterface::getClientMediaType()
     */
    public function getClientMediaType(): ?string
    {
        return $this->type;
    }

}
