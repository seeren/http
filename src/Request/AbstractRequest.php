<?php

namespace Seeren\Http\Request;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Seeren\Http\Message\AbstractMessage;
use InvalidArgumentException;

/**
 * Class for represent a generic request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Request
 */
abstract class AbstractRequest extends AbstractMessage implements RequestInterface
{

    use RequestTrait;

    /**
     * @var string
     */
    protected string $method;

    /**
     * @var UriInterface
     */
    protected UriInterface $uri;

    /**
     * @param StreamInterface $stream
     * @param UriInterface $uri
     * @param string $method
     * @param string $protocol
     * @param array $header
     */
    public function __construct(
        StreamInterface $stream,
        UriInterface $uri,
        string $method = 'GET',
        string $protocol = '1.1',
        array $header = [])
    {
        parent::__construct($protocol, $header, $stream);
        $this->method = $this->parseMethod($method);
        $this->uri = $uri;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return RequestInterface
     */
    private function with(string $name, $value): RequestInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    /**
     * {@inheritDoc}
     * @see RequestInterface::getRequestTarget()
     */
    public function getRequestTarget(): string
    {
        $path = $this->uri->getPath();
        if (!$path) {
            $path .= '/';
        }
        return $path;
    }

    /**
     * {@inheritDoc}
     * @see RequestInterface::withRequestTarget()
     */
    public function withRequestTarget($requestTarget): RequestInterface
    {
        return $this->with('uri', $this->uri->withPath((string)$requestTarget));
    }

    /**
     * {@inheritDoc}
     * @see RequestInterface::getMethod()
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     * @see RequestInterface::withMethod()
     */
    public function withMethod($method): RequestInterface
    {
        $method = strtoupper((string)$method);
        if ($method !== $this->parseMethod($method)) {
            throw new InvalidArgumentException('Method "' . $method . '" not supported');
        }
        return $this->with('method', $method);
    }

    /**
     * {@inheritDoc}
     * @see RequestInterface::getUri()
     */
    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    /**
     * {@inheritDoc}
     * @see RequestInterface::withUri()
     */
    public function withUri(UriInterface $uri, $preserveHost = false): RequestInterface
    {
        $clone = $this->with('uri', $uri);
        if (true === $preserveHost && !array_key_exists('Host', $this->headers)) {
            return $clone->withHeader('Host', $uri->getHost());
        }
        return $clone;
    }

}
