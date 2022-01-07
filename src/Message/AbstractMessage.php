<?php

namespace Seeren\Http\Message;

use Psr\Http\Message\StreamInterface;
use InvalidArgumentException;

abstract class AbstractMessage implements MessageInterface
{

    use MessageParserTrait;

    protected string $protocol;

    protected array $headers = [];

    protected function __construct(
        string $version,
        array $headers,
        protected StreamInterface $body)
    {
        $this->protocol = $this->parseProtocol($version);
        foreach ($headers as $key => $value) {
            $this->headers[$this->parseHeaderName($key)] = is_string($value) ? $this->parseHeaderValue($value): $value;
        }
    }

    private function with(string $name, $value): MessageInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    public function getProtocolVersion(): string
    {
        return str_replace(static::PROTOCOL, '', $this->protocol);
    }

    public function withProtocolVersion($version): MessageInterface
    {
        return $this->with('protocol', $this->parseProtocol($version));
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeader($name): bool
    {
        return array_key_exists($this->parseHeaderName($name), $this->headers);
    }

    public function getHeader($name): array
    {
        return $this->headers[$this->parseHeaderName($name)] ?? [];
    }

    public function getHeaderLine($name): string
    {
        return implode(',', $this->getHeader($name));
    }

    public function withHeader($name, $value): MessageInterface
    {
        if (!is_string($name) || !$value) {
            throw new InvalidArgumentException('Can\'t get ' . static::class . ' for invalid header "' . $name . '"');
        }
        $headers = $this->headers;
        $headers[$this->parseHeaderName($name)] = is_string($value) ? $this->parseHeaderValue($value) : $value;
        return $this->with('headers', $headers);
    }

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

    public function withoutHeader($name): MessageInterface
    {
        $key = $this->parseHeaderName($name);
        $headers = $this->headers;
        if (array_key_exists($key, $headers)) {
            unset($headers[$key]);
        }
        return $this->with('headers', $headers);
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        if (!$body->getMetadata('readable') && !$body->getMetadata('writable')) {
            throw new InvalidArgumentException('Can\'t get instance for body because it is closed');
        }
        return $this->with('body', $body);
    }

}
