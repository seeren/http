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
 * @version 1.3.3
 */

namespace Seeren\Http\Request;

use Psr\Http\Message\ServerRequestInterface as PsrServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use Seeren\Http\Uri\ServerRequestUri;
use Seeren\Http\Stream\ServerRequestStream;
use Seeren\Http\Upload\UploadedFile;
use InvalidArgumentException;

/**
 * Class for represent http server request
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request
 */
class ServerRequest extends AbstractRequest implements
    PsrServerRequestInterface,
    ServerRequestInterface
{

   protected

       /**
        * @var array
        */
       $server,

       /**
        * @var array
        */
       $cookie,

       /**
        * @var array
        */
       $queryParam,

       /**
        * @var array UploadedFileInterface
        */
       $uploadedFiles,

       /**
        * @var array
        */
       $parsedBody,

       /**
        * @var array
        */
       $attributes;

   /**
    * @param StreamInterface $stream
    * @param UriInterface $uri
    */
   public function __construct(
       ServerRequestStream $stream,
       ServerRequestUri $uri)
   {
       parent::__construct(
           $stream,
           $uri,
           (string) filter_input(INPUT_SERVER, self::SERVER_METHOD),
           (string) substr(
                filter_input(INPUT_SERVER, self::SERVER_PROTOCOL),
                5),
           $this->parseHeader());
       $this->server = filter_input_array(INPUT_SERVER);
       $this->cookie = $this->parseCookie();
       $this->queryParam = $this->parseQueryParam($this->uri->getQuery());
       $this->uploadedFiles = $this->parseUploadedFiles();
       $this->parsedBody = $this->parseParsedBody($this->body->__toString());
       $this->attributes = [];
   }

   /**
    * @return array request header
    */
   private final function parseHeader(): array
   {
       $headers = [];
       if (function_exists("apache_request_headers")) {
           foreach(apache_request_headers() as $key => $value) {
               $headers[$key] = $this->parseServerHeaderValue($key, $value);
           }
       }
       foreach(filter_input_array(INPUT_SERVER) as $key => $value) {
           if (strpos($key, "HTTP_") === 0) {
               $key = str_replace(" ", "-", ucwords(
                   str_replace("_", " ", strtolower(substr($key, 5)))
                   ));
               if (!array_key_exists($key, $headers)) {
                   $headers[$key] = $this->parseServerHeaderValue($key, $value);
               }
           }
       }
       return $headers;
   }

    /**
     * @param string $key
     * @param string $value
     * @return array
     */
   private final function parseServerHeaderValue(
       string $key,
       string $value): array
   {
       return "User-Agent" === $key
            ? [$value]
            : $this->parseHeaderValue($value);
   }

   /**
    * @return array request cookie
    */
   private final function parseCookie(): array
   {
       $cookie = [];
       foreach ($this->getHeader("Cookie") as $value) {
           $value = explode("=", $value);
           $key = $value[0];
           $cookieValue = "";
           if (array_key_exists(1, $value)) {
               array_shift($value);
               $cookieValue .= implode("=", $value);
           }
           $cookie[$key] = $cookieValue;
       }
       return $cookie;
   }

   /**
    * @param string $queryString query string
    * @return array request query param
    */
   private final function parseQueryParam(string $queryString): array
   {
       $queryParam = [];
       if ($queryString) {
           foreach (explode("&", $queryString) as $value) {
               $parsed = [];
               parse_str($value, $parsed);
               $key = key($parsed);
               if (array_key_exists($key, $queryParam)
                && is_array($queryParam[$key])
                && is_array(current($parsed))) {
                    $queryParam[$key][] = current(current($parsed));
                    continue;
               }
               $queryParam[key($parsed)] = current($parsed);
           }
       }
       return $queryParam;
   }

   /**
    * @return array uploaded files
    */
   private final function parseUploadedFiles(): array
   {
       $uploadedFiles = [];
       foreach ($_FILES as $key => &$file) {
           if (is_array(current($file))) {
               $uploadedFiles[$key] = [];
               foreach (array_keys($file[UploadedFile::NAME]) as $fK) {
                   $uploadedFiles[$key][$fK] = new UploadedFile([
                       UploadedFile::NAME  => $file[UploadedFile::NAME][$fK],
                       UploadedFile::TYPE  => $file[UploadedFile::TYPE][$fK],
                       UploadedFile::TMP   => $file[UploadedFile::TMP][$fK],
                       UploadedFile::ERROR => $file[UploadedFile::ERROR][$fK],
                       UploadedFile::SIZE  => $file[UploadedFile::SIZE][$fK]
                   ]);
               }
               continue;
           }
           $uploadedFiles[$key] = new UploadedFile($file);
       }
       return $uploadedFiles;
   }

   /**
    * @param array $body server body
    * @return array parsed body
    */
   private final function parseParsedBody($body): array
   {
       if (is_string($body) && "" !== $body) {
           return $this->parseQueryParam($body);
       }
       $parsedBody = [];
       if (is_array($body) || is_object($body)) {
           foreach ($body as $key => $value) {
               $parsedBody[$key] = $value;
           }
       }
       return $parsedBody;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getServerParams()
    */
   public final function getServerParams(): array
   {
       return $this->server;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getCookieParams()
    */
   public final function getCookieParams(): array
   {
       return $this->cookie;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::withCookieParams()
    */
   public final function withCookieParams(
       array $cookies): ServerRequestInterface
   {
       return $this->with("cookie", $cookies);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getQueryParams()
    */
   public final function getQueryParams(): array
   {
       return $this->queryParam;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::withQueryParams()
    */
   public final function withQueryParams(array $query): ServerRequestInterface
   {
       return $this->with("queryParam", $query);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getUploadedFiles()
    */
   public final function getUploadedFiles(): array
   {
       return $this->uploadedFiles;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::withUploadedFiles()
    */
   public final function withUploadedFiles(
       array $uploadedFiles): ServerRequestInterface
   {
       foreach ($uploadedFiles as &$value) {
           if (!$value instanceof UploadedFileInterface) {
               throw new InvalidArgumentException(
                   "Can't get instance: "
                 . "must implement UploadedFileInterface");
           }
       }
       return $this->with("uploadedFiles", $uploadedFiles);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getParsedBody()
    */
   public final function getParsedBody(): array
   {
       return $this->parsedBody;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::withParsedBody()
    */
   public final function withParsedBody($data): ServerRequestInterface
   {
       if (null !== $data && !is_array($data) && !is_object($data)) {
           throw new InvalidArgumentException(
               "Can't get instance for parsed body: "
             . "must be null, array or object");
       }
       return $this->with("parsedBody", $this->parseParsedBody($data));
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getAttributes()
    */
   public final function getAttributes(): array
   {
       return $this->attributes;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::getAttribute()
    */
   public final function getAttribute($name, $default = null)
   {
       return array_key_exists($name, $this->attributes)
            ? $this->attributes[$name]
            : $default;
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::withAttribute()
    */
   public final function withAttribute($name, $value): ServerRequestInterface
   {
       $attributes = $this->attributes;
       $attributes[$name] = $value;
       return $this->with("attributes", $attributes);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Http\Message\ServerRequestInterface::withoutAttribute()
    */
   public final function withoutAttribute($name): ServerRequestInterface
   {
       $attributes = $this->attributes;
       if (array_key_exists($name, $attributes)) {
           unset($attributes[$name]);
       }
       return $this->with("attributes", $attributes);
   }

}
