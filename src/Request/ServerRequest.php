<?php

/**
 * This file contain Seeren\Http\Request\ServerRequest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.3
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
        * @var array server param
        */
       $server,
       /**
        * @var array cookie
        */
       $cookie,
       /**
        * @var array query param
        */
       $queryParam,
       /**
        * @var array UploadedFileInterface collection
        */
       $uploadedFiles,
       /**
        * @var array parsed body
        */
       $parsedBody,
       /**
        * @var array attributes
        */
       $attributes;

   /**
    * Construct ServerRequest
    * 
    * @param StreamInterface $stream server request stream
    * @param UriInterface $uri server request uri
    * @return null
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
       $this->queryParam = $this->parseQueryParam();
       $this->uploadedFiles = $this->parseUploadedFiles();
       $this->parsedBody = $this->parseParsedBody($this->body->__toString());
       $this->attributes =
       $_REQUEST = $_SERVER = $_COOKIE = $_GET = $_FILES = $_POST = [];
   }

   /**
    * Parse header
    * 
    * @return array request header
    */
   private final function parseHeader(): array
   {
       $headers = [];
       if(function_exists("apache_request_headers")) {
           foreach (apache_request_headers() as $key => $value) {
               $headers[$key] = $this->parseServerHeaderValue($key, $value);
           }
       } else {
           foreach(filter_input_array(INPUT_SERVER) as $key => $value) {
               if (strpos($key, "HTTP_") === 0) {
                   $key = str_replace(" ", "-", ucwords(
                              str_replace("_", " ", strtolower(substr($key, 5)))
                           ));
                   $headers[$key] = $this->parseServerHeaderValue($key, $value);
               }
           }
       }
       return $headers;
   }

    /**
     * Parse header value
     * 
     * @param string $key
     * @param string $value
     * @return array header value
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
    * Parse cookie
    *
    * @return array request cookie
    */
   private final function parseCookie(): array
   {
       $cookie = [];
       foreach ($this->getHeader("Cookie") as $value) {
           $value = explode("=", $value);
           $cookie[$value[0]] = array_key_exists(1, $value) ? $value[1] : "";
       }
       return $cookie;
   }

   /**
    * Parse query param
    *
    * @return array request query param
    */
   private final function parseQueryParam(): array
   {
       $queryParam = [];
       foreach (explode("&", $this->uri->getQuery()) as $value) {
           if ("" !== $value) {
               $value = explode("=", $value);
               $queryParam[urldecode($value[0])] = array_key_exists(1, $value)
                                                 ? urldecode($value[1])
                                                 : "";
           }
       }
       return $queryParam;
   }

   /**
    * Parse server uploaded files
    *
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
           } else {
               $uploadedFiles[$key] = new UploadedFile($file);
           }
       }
       return $uploadedFiles;
   }

   /**
    * Parse parsed body
    *
    * @param array $body server body
    * @return array parsed body
    */
   private final function parseParsedBody($body = null): array
   {
       $parsedBody = [];
       if (is_string($body) && "" !== $body) {
           foreach (explode("&", $body) as $value) {
               parse_str($value, $parsed);
               if (array_key_exists(key($parsed), $parsedBody)
                && is_array($parsedBody[key($parsed)])) {
                   $parsedBody[key($parsed)][] = is_array(current($parsed))
                                               ? current(current($parsed))
                                               : "";
               } else {
                   $parsedBody[key($parsed)] = current($parsed);
               }
           }
       } else if (is_array($body) || is_object($body)) {
           foreach ($body as $key => $value) {
               $parsedBody[$key] = $value;
           }
       } else if (!$body && [] !== $_POST) {
           $parsedBody = filter_input_array(INPUT_POST);
       }
       return $parsedBody;
   }

   /**
    * Get server param
    *
    * @return array server params
    */
   public final function getServerParams(): array
   {
       return $this->server;
   }

   /**
    * Get cookies
    *
    * @return array cookies params
    */
   public final function getCookieParams(): array
   {
       return $this->cookie;
   }

   /**
    * Get an instance for cookies
    *
    * @param array $cookies cookie
    * @return MessageInterface for cookies
    */
   public final function withCookieParams(
       array $cookies): ServerRequestInterface
   {
       return $this->with("cookie", $cookies);
   }

   /**
    * Get query params
    *
    * @return array query params
    */
   public final function getQueryParams(): array
   {
       return $this->queryParam;
   }

   /**
    * Get an instance for query params
    *
    * @param array $query query params
    * @return MessageInterface for query params
    */
   public final function withQueryParams(array $query): ServerRequestInterface
   {
       return $this->with("queryParam", $query);
   }

   /**
    * Get UploadedFiles
    *
    * @return array UploadedFileInterface collection
    */
   public final function getUploadedFiles(): array
   {
       return $this->uploadedFiles;
   }

   /**
    * Get a new instance for uploadedFiles
    *
    * @param array UploadedFileInterface collection
    * @return MessageInterface for uploadedFiles
    * 
    * @throws InvalidArgumentException
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
    * Get parsed body
    *
    * @return null|array|object deserialized body parameters
    */
   public final function getParsedBody(): array
   {
       return $this->parsedBody;
   }

   /**
    * Get an instance for deserialized body
    *
    * @param null|array|object $data deserialized body data
    * @return MessageInterface for deserialized body
    * 
    * @throws InvalidArgumentException
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
    * Get attributes
    * 
    * @return array attributes
    */
   public final function getAttributes(): array
   {
       return $this->attributes;
   }

   /**
    * Get attributes
    *
    * @param string $name attribute name
    * @param mixed $default default value
    * @return mixed
    */
   public final function getAttribute($name, $default = null)
   {
       return array_key_exists($name, $this->attributes)
            ? $this->attributes[$name]
            : $default;
   }

   /**
    * Get an instance for attribute
    *
    * @param string $name name
    * @param mixed $value value
    * @return MessageInterface for attribute
    */
   public final function withAttribute($name, $value): ServerRequestInterface
   {
       $attributes = $this->attributes;
       $attributes[$name] = $value;
       return $this->with("attributes", $attributes);
   }

   /**
    * Get an instance without attribute
    *
    * @param string $name name
    * @return MessageInterface
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
