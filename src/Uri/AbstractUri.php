<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.3
 */

namespace Seeren\Http\Uri;

use InvalidArgumentException;

/**
 * Class for represent a generic uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 * @abstract
 */
abstract class AbstractUri
{

   protected
       /**
        * @var string
        */
       $scheme,
       /**
        * @var string
        */
       $user,
       /**
        * @var string
        */
       $host,
       /**
        * @var string
        */
       $port,
       /**
        * @var string
        */
       $path,
       /**
        * @var string
        */
       $query,
       /**
        * @var string
        */
       $fragment;

   /**
    * @param string $scheme uri scheme
    * @param string $user uri user
    * @param string $host uri host
    * @param string $host uri port
    * @param string $path uri path
    * @param string $query uri query
    * @param string $fragment uri fragment
    */
   protected function __construct(
       string $scheme,
       string $user,
       string $host,
       int $port,
       string $path,
       string $query,
       string $fragment = "")
   {
       $this->scheme = $this->parseScheme($scheme);
       $this->user = $user;
       $this->host =  $this->parseHost($host);
       $this->port = $this->parsePort($port);
       $this->path = $this->parsePath($path);
       $this->query = $this->parseQuery($query);
       $this->fragment = $fragment;
   }

   /**
    * @param string $scheme uri scheme
    * @return string uri scheme
    */
   private final function parseScheme(string $scheme): string
   {
       return $scheme === static::SCHEME_HTTPS
            ? static::SCHEME_HTTPS
            : static::SCHEME_HTTP;
   }

   /**
    * @param string $host uri host
    * @return string uri host
    */
   private final function parseHost(string $host): string
   {
       return preg_match("/^([a-z0-9-\.])+$/", $host) ? $host : "";
   }

   /**
    * @param string $host uri port
    * @return null|int uri port
    */
   private final function parsePort(int $port)
   {
       return 0 < $port && 63737 >= $port ? $port : null;
   }

   /**
    * @param string $host uri port
    * @return string uri path
    */
   private final function parsePath(string $path): string
   {
       return preg_match("/^([\w-_\.\/])+$/", $path)
            ? ltrim($path, static::SEPARATOR)
            : "";
   }

   /**
    * @param string $query uri query string
    * @return string uri query string
    */
   private final function parseQuery(string $query): string
   {
       $parsedQuery = "";
       foreach (explode("&", $query) as $value) {
           $value = explode("=", $value, 2);
           $parsedQuery .= "&" . urlencode(urldecode($value[0]));
           $parsedQuery .= array_key_exists(1, $value)
                         ? "=" . urlencode(urldecode($value[1]))
                         : "";
       }   
       return substr($parsedQuery, 1);
   }

   /**
    * @param string $name attribute name
    * @param mixed $value attribute value
    * @return UriInterface self with
    */
   private final function with(string $name, $value): UriInterface
   {
       $clone = clone $this;
       $clone->{$name} = $value;
       return $clone;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getScheme()
    */
   public final function getScheme(): string
   {
       return $this->scheme;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getAuthority()
    */
   public final function getAuthority(): string
   {
       return ($this->user ? $this->user . static::USER_SEPARATOR : "")
            . $this->host
            . ($this->port ? static::HOST_SEPARATOR . $this->port : "");
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getUserInfo()
    */
   public final function getUserInfo(): string
   {
       return $this->user;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getHost()
    */
   public final function getHost(): string
   {
       return $this->host;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getPort()
    */
   public final function getPort()
   {
       return $this->port;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getPath()
    */
   public function getPath(): string
   {
       return $this->path;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getQuery()
    */
   public final function getQuery(): string
   {
       return $this->query;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::getFragment()
    */
   public final function getFragment(): string
   {
       return $this->fragment;
   }
    
    /**
     * {@inheritDoc}
     * @see \Psr\Http\Message\UriInterface::withScheme()
     */
   public final function withScheme($scheme): UriInterface
   {
       if (!is_string($scheme)
        || !($parsedScheme = $this->parseScheme($scheme))
        || $parsedScheme !== strtolower($scheme)) {
           throw new InvalidArgumentException(
               "Can't get with scheme: not supported");
       }
       return $this->with("scheme", $parsedScheme);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::withUserInfo()
    */
   public final function withUserInfo($user, $password = null): UriInterface
   {
       return $this->with(
           "user",
           $user . ($password ? static::HOST_SEPARATOR . $password: ""));
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::withHost()
    */
   public final function withHost($host): UriInterface
   {
       if (!is_string($host) || !($parsedHost = $this->parseHost($host))) {
           throw new InvalidArgumentException(
               "Can't get with host: invalid host name");
       }
       return $this->with("host", $parsedHost);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::withPort()
    */
   public final function withPort($port): UriInterface
   {
       if (!is_int($port)
        || !($parsedPort = $this->parsePort($port))) {
           throw new InvalidArgumentException(
               "Can't get with port: invalid port range");
       }
       return $this->with("port", $parsedPort);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::withPath()
    */
   public function withPath($path): UriInterface
   {
       if (!is_string($path)
        || !($parsedPath = $this->parsePath($path))) {
           throw new InvalidArgumentException(
               "Can't get with path: invalid expression");
       }
       return $this->with("path", $parsedPath);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::withQuery()
    */
   public final function withQuery($query): UriInterface
   {
       if (!is_string($query)) {
           throw new InvalidArgumentException(
               "Can't get with query: invalid query string");
       }
       return $this->with("query", $this->parseQuery($query));
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\UriInterface::withFragment()
    */
   public final function withFragment($fragment): UriInterface
   {
       return $this->with("fragment", $fragment);
   }

   /**
    * @return string
    */
   public function __toString()
   {        
       return $this->scheme
            . static::SCHEME_SEPARATOR
            . $this->getAuthority()
            . ($this->path
            ? static::SEPARATOR . $this->path
            : ($this->query || $this->fragment ? static::SEPARATOR : ""))
            . ($this->query ? static::PATH_SEPARATOR . $this->query : "")
            . ($this->fragment
            ? static::QUERY_SEPARATOR . $this->fragment
            : "");
   }

}
