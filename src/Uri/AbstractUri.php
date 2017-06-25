<?php

/**
 * This file contain Seeren\Http\Uri\AbstractUri class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
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
        * @var string uri scheme
        */
       $scheme,
       /**
        * @var string uri user
        */
       $user,
       /**
        * @var string uri host
        */
       $host,
       /**
        * @var string uri port
        */
       $port,
       /**
        * @var string uri path
        */
       $path,
       /**
        * @var string uri query
        */
       $query,
       /**
        * @var string uri fragment
        */
       $fragment;

   /**
    * Construct AbstractUri
    * 
    * @param string $scheme uri scheme
    * @param string $user uri user
    * @param string $host uri host
    * @param string $host uri port
    * @param string $path uri path
    * @param string $query uri query
    * @param string $fragment uri fragment
    * @return null
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
    * Parse scheme
    * 
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
    * Parse host
    *
    * @param string $host uri host
    * @return string uri host
    */
   private final function parseHost(string $host): string
   {
       return preg_match("/^([a-z0-9-\.])+$/", $host) ? $host : "";
   }

   /**
    * Parse port
    * 
    * @param string $host uri port
    * @return null|int uri port
    */
   private final function parsePort(int $port)
   {
       return 0 < $port && 63737 >= $port ? $port : null;
   }

   /**
    * Parse path
    *
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
    * Parse query
    * 
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
    * Get self with
    *
    * @param string $name attribute name
    * @param mixed $value attribute value
    * 
    * @return UriInterface self with
    */
   private final function with(string $name, $value): UriInterface
   {
       $clone = clone $this;
       $clone->{$name} = $value;
       return $clone;
   }

   /**
    * Get uri scheme
    *
    * @return string uri scheme
    */
   public final function getScheme(): string
   {
       return $this->scheme;
   }

   /**
    * Get uri authority
    * 
    * @return string uri authority
    */
   public final function getAuthority(): string
   {
       return ($this->user ? $this->user . static::USER_SEPARATOR : "")
            . $this->host
            . ($this->port ? static::HOST_SEPARATOR . $this->port : "");
   }

   /**
    * Get uri user
    *
    * @return string uri user
    */
   public final function getUserInfo(): string
   {
       return $this->user;
   }

   /**
    * Get uri host
    *
    * @return string uri host
    */
   public final function getHost(): string
   {
       return $this->host;
   }

   /**
    * Get uri port
    *
    * @return null|int uri port
    */
   public final function getPort()
   {
       return $this->port;
   }

   /**
    * Get uri path
    *
    * @return string uri path
    */
   public function getPath(): string
   {
       return $this->path;
   }

   /**
    * Get uri query string
    *
    * @return string uri query string
    */
   public final function getQuery(): string
   {
       return $this->query;
   }

   /**
    * Get uri fragment
    *
    * @return string uri fragment
    */
   public final function getFragment(): string
   {
       return $this->fragment;
   }
    
   /**
    * Get an instance for uri scheme
    * 
    * @param string $scheme uri scheme
    * @return UriInterface for uri scheme
    * 
    * @throws InvalidArgumentException
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
    * Get an instance for user information
    *
    * @param string $user uri user name
    * @param null|string $password uri user password
    * @return UriInterface for uri user information
    */
   public final function withUserInfo($user, $password = null): UriInterface
   {
       return $this->with(
           "user",
           $user . ($password ? static::HOST_SEPARATOR . $password: ""));
   }

   /**
    * Get an instance for uri host
    *
    * @param string $host uri host
    * @return UriInterface for uri host
    * 
    * @throws InvalidArgumentException
    */
   public final function withHost($host): UriInterface
   {
       if (!is_string($host)
        || !($parsedHost = $this->parseHost($host))) {
           throw new InvalidArgumentException(
               "Can't get with host: invalid host name");
       }
       return $this->with("host", $parsedHost);
   }

   /**
    * Get an instance for uri port
    *
    * @param null|int $port uri port
    * @return UriInterface for uri port
    * 
    * @throws InvalidArgumentException for invalid ports
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
    * Get an instance for uri path
    *
    * @param string $path uri path
    * @return UriInterface for uri path
    * 
    * @throws InvalidArgumentException
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
    * Get an instance for uri query string
    *
    * @return UriInterface for uri query string
    * 
    * @throws InvalidArgumentException
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
    * Get an instance for uri fragment
    *
    *
    * @param string $fragment uri fragment
    * @return UriInterface an instance for uri fragment
    */
   public final function withFragment($fragment): UriInterface
   {
       return $this->with("fragment", $fragment);
   }

   /**
    * Get UriInterface to string
    *
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
