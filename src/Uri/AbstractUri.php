<?php

namespace Seeren\Http\Uri;

use InvalidArgumentException;

abstract class AbstractUri implements UriInterface
{

    use UriParserTrait;

    private string $scheme;

    private string $host;

    private ?int $port;

    private string $path;

    private string $query;

    public function __construct(
        string $scheme,
        private string $user,
        string $host,
        ?int $port,
        string $path,
        string $query,
        private string $fragment)
    {
        $this->scheme = $this->parseScheme($scheme);
        $this->host = $this->parseHost($host);
        $this->port = $this->parsePort($port);
        $this->path = $this->parsePath($path);
        $this->query = $this->parseQuery($query);
    }

    private function with(string $name, $value): UriInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    public final function getScheme(): string
    {
        return $this->scheme;
    }

    public final function getAuthority(): string
    {
        $authority = '';
        if ($this->user) {
            $authority .= $this->user . self::USER_SEPARATOR;
        }
        $authority .= $this->host;
        if ($this->port) {
            $authority .= self::HOST_SEPARATOR . $this->port;
        }
        return $authority;
    }

    public final function getUserInfo(): string
    {
        return $this->user;
    }

    public final function getHost(): string
    {
        return $this->host;
    }

    public final function getPort(): ?int
    {
        return $this->port;
    }

    public final function getPath(): string
    {
        return $this->path;
    }

    public final function getQuery(): string
    {
        return $this->query;
    }

    public final function getFragment(): string
    {
        return $this->fragment;
    }

    public final function withScheme($scheme): UriInterface
    {
        return $this->with('scheme', $this->parseScheme((string)$scheme));
    }

    public final function withUserInfo($user, $password = null): UriInterface
    {
        $userInfo = $user;
        if (null !== $password) {
            $userInfo .= self::HOST_SEPARATOR . $password;
        }
        return $this->with('user', $userInfo);
    }

    public final function withHost($host): UriInterface
    {
        return $this->with('host', $this->parseHost((string)$host));
    }

    public final function withPort($port): UriInterface
    {
        if (null !== $port) {
            $port = (int)$port;
        }
        return $this->with('port', $this->parsePort($port));
    }

    public final function withPath($path): UriInterface
    {
        return $this->with('path', $this->parsePath((string)$path));
    }


    public final function withQuery($query): UriInterface
    {
        if (!is_string($query)) {
            throw new InvalidArgumentException('Query string is invalid');
        }
        return $this->with('query', $this->parseQuery((string)$query));
    }

    public final function withFragment($fragment): UriInterface
    {
        return $this->with('fragment', $fragment);
    }

    public final function __toString(): string
    {
        $uri = $this->scheme . self::SCHEME_SEPARATOR . $this->getAuthority();
        if ($this->path || $this->query || $this->fragment) {
            $uri .= self::SEPARATOR;
        }
        if ($this->path) {
            $uri .= $this->path;
        }
        if ($this->query) {
            $uri .= self::PATH_SEPARATOR . $this->query;
        }
        if ($this->fragment) {
            $uri .= self::QUERY_SEPARATOR . $this->fragment;
        }
        return $uri;
    }

}
