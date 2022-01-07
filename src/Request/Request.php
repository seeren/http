<?php

namespace Seeren\Http\Request;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use InvalidArgumentException;

class Request extends AbstractRequest implements ServerRequestInterface
{

    use ServerRequestParserTrait;

    private array $server;

    private array $cookie;

    private array $queryParam;

    private array $uploadedFiles;

    private array $parsedBody;

    private array $attributes = [];

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

    private function with(string $name, $value): ServerRequestInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    public function getServerParams(): array
    {
        return $this->server;
    }

    public final function getCookieParams(): array
    {
        return $this->cookie;
    }

    public final function withCookieParams(array $cookies): ServerRequestInterface
    {
        return $this->with('cookie', $cookies);
    }

    public final function getQueryParams(): array
    {
        return $this->queryParam;
    }

    public final function withQueryParams(array $query): ServerRequestInterface
    {
        return $this->with('queryParam', $query);
    }

    public final function getUploadedFiles(): array
    {
        return $this->uploadedFiles;
    }


    public final function withUploadedFiles(array $uploadedFiles): ServerRequestInterface
    {
        foreach ($uploadedFiles as $value) {
            if (!is_object($value) || !($value instanceof UploadedFileInterface)) {
                throw new InvalidArgumentException('Collection elements must implement UploadedFileInterface');
            }
        }
        return $this->with('uploadedFiles', $uploadedFiles);
    }

    public final function getParsedBody(): array
    {
        return $this->parsedBody;
    }

    public final function withParsedBody($data): ServerRequestInterface
    {
        $parsedBody = [];
        if (is_object($data)) {
            $parsedBody = (array)$data;
        } elseif (!is_null($data) && !is_array($data)) {
            throw new InvalidArgumentException('Body must be null, array or object');
        }
        return $this->with('parsedBody', $parsedBody);
    }

    public final function getAttributes(): array
    {
        return $this->attributes;
    }

    public final function getAttribute($name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }

    public final function withAttribute($name, $value): ServerRequestInterface
    {
        $attributes = $this->attributes;
        $attributes[$name] = $value;
        return $this->with("attributes", $attributes);
    }

    public final function withoutAttribute($name): ServerRequestInterface
    {
        $attributes = $this->attributes;
        if (array_key_exists($name, $attributes)) {
            unset($attributes[$name]);
        }
        return $this->with("attributes", $attributes);
    }

}
