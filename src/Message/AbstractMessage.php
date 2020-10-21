<?php

namespace Seeren\Http\Message;

use Psr\Http\Message\StreamInterface;
use InvalidArgumentException;

/**
 * Class to represent a generic message
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Message
 */
abstract class AbstractMessage implements MessageInterface
{

    use MessageTrait;

    /**
     * @var string
     */
    protected string $protocol;

    /**
     * @var array
     */
    protected array $headers = [];

    /**
     * @var StreamInterface
     */
    protected StreamInterface $body;

    /**
     * @param string $version
     * @param array $headers
     * @param StreamInterface $stream
     */
    protected function __construct(
        string $version,
        array $headers,
        StreamInterface $stream)
    {
        $this->protocol = $this->parseProtocol($version);
        $this->body = $stream;
        foreach ($headers as $key => $value) {
            $this->headers[$this->parseHeaderName($key)] = is_string($value) ? $this->parseHeaderValue($value): $value;
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return MessageInterface
     */
    private function with(string $name, $value): MessageInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::getProtocolVersion()
     */
    public function getProtocolVersion(): string
    {
        return str_replace(static::PROTOCOL, '', $this->protocol);
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::withProtocolVersion()
     */
    public function withProtocolVersion($version): MessageInterface
    {
        return $this->with('protocol', $this->parseProtocol($version));
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::getHeaders()
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::hasHeader()
     */
    public function hasHeader($name): bool
    {
        return array_key_exists($this->parseHeaderName($name), $this->headers);
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::getHeader()
     */
    public function getHeader($name): array
    {
        return $this->headers[$this->parseHeaderName($name)] ?? [];
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::getHeaderLine()
     */
    public function getHeaderLine($name): string
    {
        return implode(',', $this->getHeader($name));
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::withHeader()
     */
    public function withHeader($name, $value): MessageInterface
    {
        if (!is_string($name) || !$value) {
            throw new InvalidArgumentException('Can\'t get ' . static::class . ' for invalid header "' . $name . '"');
        }
        $headers = $this->headers;
        $headers[$this->parseHeaderName($name)] = is_string($value) ? $this->parseHeaderValue($value) : $value;
        return $this->with('headers', $headers);
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::withAddedHeader()
     */
    public function withAddedHeader($name, $value): MessageInterface
    {
        $key = $this->parseHeaderName($name);
        $headers = $this->headers;
        if (!array_key_exists($key, $headers)) {
            if (!is_string($name) || !$value) {
                throw new InvalidArgumentException('Can\'t get ' . static::class . ' for invalid header "' . $name . '"');
            }
            $headers[$key] = is_string($value) ? $this->parseHeaderValue($value) : $value;
        }
        return $this->with('headers', $headers);
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::withoutHeader()
     */
    public function withoutHeader($name): MessageInterface
    {
        $key = $this->parseHeaderName($name);
        $headers = $this->headers;
        if (array_key_exists($key, $headers)) {
            unset($headers[$key]);
        }
        return $this->with('headers', $headers);
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::getBody()
     */
    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    /**
     * {@inheritDoc}
     * @see MessageInterface::withBody()
     */
    public function withBody(StreamInterface $body): MessageInterface
    {
        if (!$body->getMetadata('readable') && !$body->getMetadata('writable')) {
            throw new InvalidArgumentException('Can\'t get instance for body because it is closed');
        }
        return $this->with('body', $body);
    }

}
