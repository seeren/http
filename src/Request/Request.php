<?php

namespace Seeren\Http\Request;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use InvalidArgumentException;

/**
 * Class to represent a request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Request
 */
class Request extends AbstractRequest implements ServerRequestInterface
{

    use ServerRequestTrait;

    /**
     * @var array
     */
    private array $server;

    /**
     * @var array
     */
    private array $cookie;

    /**
     * @var array
     */
    private array $queryParam;

    /**
     * @var array
     */
    private array $uploadedFiles;

    /**
     * @var array
     */
    private array $parsedBody;

    /**
     * @var array
     */
    private array $attributes = [];

    /**
     * @param StreamInterface $stream
     * @param UriInterface $uri
     */
    public function __construct(StreamInterface $stream, UriInterface $uri)
    {
        parent::__construct(
            $stream,
            $uri,
            (string)filter_input(INPUT_SERVER, self::SERVER_METHOD),
            (string)substr(filter_input(INPUT_SERVER, self::SERVER_PROTOCOL), 5),
            $this->parseRequestHeader()
        );
        $this->server = filter_input_array(INPUT_SERVER);
        $this->cookie = $this->parseCookie();
        $this->queryParam = $this->parseQueryParam($this->uri->getQuery());
        $this->uploadedFiles = $this->parseUploadedFiles();
        $this->parsedBody = $this->parseParsedBody((string)$this->body);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return ServerRequestInterface
     */
    private function with(string $name, $value): ServerRequestInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getServerParams()
     */
    public function getServerParams(): array
    {
        return $this->server;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getCookieParams()
     */
    public function getCookieParams(): array
    {
        return $this->cookie;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::withCookieParams()
     */
    public function withCookieParams(array $cookies): ServerRequestInterface
    {
        return $this->with('cookie', $cookies);
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getQueryParams()
     */
    public function getQueryParams(): array
    {
        return $this->queryParam;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::withQueryParams()
     */
    public function withQueryParams(array $query): ServerRequestInterface
    {
        return $this->with('queryParam', $query);
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getUploadedFiles()
     */
    public function getUploadedFiles(): array
    {
        return $this->uploadedFiles;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::withUploadedFiles()
     */
    public function withUploadedFiles(array $uploadedFiles): ServerRequestInterface
    {
        foreach ($uploadedFiles as $value) {
            if (!is_object($value) || !($value instanceof UploadedFileInterface)) {
                throw new InvalidArgumentException('Collection elements must implement UploadedFileInterface');
            }
        }
        return $this->with('uploadedFiles', $uploadedFiles);
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getParsedBody()
     */
    public function getParsedBody(): array
    {
        return $this->parsedBody;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::withParsedBody()
     */
    public function withParsedBody($data): ServerRequestInterface
    {
        $parsedBody = [];
        if (is_object($data)) {
            $parsedBody = (array)$data;
        } elseif (!is_null($data) && !is_array($data)) {
            throw new InvalidArgumentException('Body must be null, array or object');
        }
        return $this->with('parsedBody', $parsedBody);
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getAttributes()
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::getAttribute()
     */
    public function getAttribute($name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::withAttribute()
     */
    public function withAttribute($name, $value): ServerRequestInterface
    {
        $attributes = $this->attributes;
        $attributes[$name] = $value;
        return $this->with("attributes", $attributes);
    }

    /**
     * {@inheritDoc}
     * @see ServerRequestInterface::withoutAttribute()
     */
    public function withoutAttribute($name): ServerRequestInterface
    {
        $attributes = $this->attributes;
        if (array_key_exists($name, $attributes)) {
            unset($attributes[$name]);
        }
        return $this->with("attributes", $attributes);
    }

}
