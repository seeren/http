<?php

namespace Seeren\Http\Uri;

use InvalidArgumentException;

/**
 * Class to represent a generic URI
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Uri
 */
abstract class AbstractUri implements UriInterface
{

    use UriTrait;

    /**
     * @var string
     */
    private string $scheme;

    /**
     * @var string|null
     */
    private string $user;

    /**
     * @var string
     */
    private string $host;

    /**
     * @var int|null
     */
    private ?int $port;

    /**
     * @var string|null
     */
    private string $path;

    /**
     * @var string|null
     */
    private string $query;

    /**
     * @var string|null
     */
    private string $fragment;

    /**
     * @param string $scheme
     * @param string $user
     * @param string $host
     * @param int|null $port
     * @param string $path
     * @param string $query
     * @param string $fragment
     *
     * @throws InvalidArgumentException
     */
    public function __construct(
        string $scheme,
        string $user,
        string $host,
        ?int $port,
        string $path,
        string $query,
        string $fragment)
    {
        $this->scheme = $this->scheme($scheme);
        $this->user = $user;
        $this->host = $this->host($host);
        $this->port = $this->port($port);
        $this->path = $this->path($path);
        $this->query = $this->query($query);
        $this->fragment = $fragment;
    }

    /**
     * @param string $name
     * @param $value
     * @return UriInterface
     */
    private function with(string $name, $value): UriInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getScheme()
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getAuthority()
     */
    public function getAuthority(): string
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

    /**
     * {@inheritDoc}
     * @see UriInterface::getUserInfo()
     */
    public function getUserInfo(): string
    {
        return $this->user;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getHost()
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getPort()
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getPath()
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getQuery()
     */
    public final function getQuery(): string
    {
        return $this->query;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::getFragment()
     */
    public final function getFragment(): string
    {
        return $this->fragment;
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::withScheme()
     */
    public function withScheme($scheme): UriInterface
    {
        return $this->with('scheme', $this->scheme((string)$scheme));
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::withUserInfo()
     */
    public function withUserInfo($user, $password = null): UriInterface
    {
        $userInfo = $user;
        if (null !== $password) {
            $userInfo .= self::HOST_SEPARATOR . $password;
        }
        return $this->with('user', $userInfo);
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::withHost()
     */
    public function withHost($host): UriInterface
    {
        return $this->with('host', $this->host((string)$host));
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::withPort()
     */
    public function withPort($port): UriInterface
    {
        if (null !== $port) {
            $port = (int)$port;
        }
        return $this->with('port', $this->port($port));
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::withPath()
     */
    public function withPath($path): UriInterface
    {
        return $this->with('path', $this->path((string)$path));
    }

    /**
     * {@inheritDoc}
     * @see \Psr\Http\Message\UriInterface::withQuery()
     */
    public function withQuery($query): UriInterface
    {
        if (!is_string($query)) {
            throw new InvalidArgumentException('Query string is invalid');
        }
        return $this->with('query', $this->query((string)$query));
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::withFragment()
     */
    public function withFragment($fragment): UriInterface
    {
        return $this->with('fragment', $fragment);
    }

    /**
     * {@inheritDoc}
     * @see UriInterface::__toString()
     */
    public function __toString(): string
    {
        $uri = $this->scheme . self::SCHEME_SEPARATOR . $this->getAuthority();
        if ($this->path) {
            $uri .= self::SEPARATOR . $this->path;
        } else if ($this->query || $this->fragment) {
            $uri .= self::SEPARATOR;
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
