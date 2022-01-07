<?php

namespace Seeren\Http\Request;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Seeren\Http\Message\AbstractMessage;
use InvalidArgumentException;

abstract class AbstractRequest extends AbstractMessage implements RequestInterface
{

    use RequestParserTrait;

    protected string $method;

    public function __construct(
        StreamInterface $stream,
        protected UriInterface $uri,
        string $method = 'GET',
        string $protocol = '1.1',
        array $header = [])
    {
        parent::__construct($protocol, $header, $stream);
        $this->method = $this->parseMethod($method);
    }

    private function with(string $name, $value): RequestInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    public final function getRequestTarget(): string
    {
        $path = $this->uri->getPath();
        if (!$path) {
            $path .= '/';
        }
        return $path;
    }

    public final function withRequestTarget($requestTarget): RequestInterface
    {
        return $this->with('uri', $this->uri->withPath((string)$requestTarget));
    }

    public final function getMethod(): string
    {
        return $this->method;
    }

    public final function withMethod($method): RequestInterface
    {
        $method = strtoupper((string)$method);
        if ($method !== $this->parseMethod($method)) {
            throw new InvalidArgumentException('Method "' . $method . '" not supported');
        }
        return $this->with('method', $method);
    }

    public final function getUri(): UriInterface
    {
        return $this->uri;
    }

    public final function withUri(UriInterface $uri, $preserveHost = false): RequestInterface
    {
        $clone = $this->with('uri', $uri);
        if (true === $preserveHost && !array_key_exists('Host', $this->headers)) {
            return $clone->withHeader('Host', $uri->getHost());
        }
        return $clone;
    }

}
