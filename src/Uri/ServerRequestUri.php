<?php

/**
 * This file contain Seeren\Http\Uri\ServerRequestUri class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.1.7
 */

namespace Seeren\Http\Uri;

use Psr\Http\Message\UriInterface as PsrUriInterface;

/**
 * Class for represent server request uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
class ServerRequestUri extends AbstractUri implements
    PsrUriInterface,
    ServerRequestUriInterface
{

   private
       /**
        * @var string redirected uri
        */
       $redirect;

   /**
    * Construct ServerRequestUri
    * 
    * @return null
    */
   public function __construct()
   {
       parent::__construct(
           (string) filter_input(INPUT_SERVER, self::SERVER_SCHEME),
           (string) filter_input(INPUT_SERVER, self::SERVER_USER),
           (string) filter_input(INPUT_SERVER, self::SERVER_HOST),
           (int) filter_input(INPUT_SERVER, self::SERVER_PORT),
           (string) filter_input(INPUT_SERVER, self::SERVER_PATH),
           (string) filter_input(INPUT_SERVER, self::SERVER_QUERY)
       );
       $this->redirect = $this->parseRedirect();
   }

   /**
    * Parse redirect uri
    * 
    * @return string redirect uri
    */
   private final function parseRedirect(): string
   {
       if (($redirect = ltrim((string)
                filter_input(INPUT_SERVER, self::SERVER_REQUEST_URI),
                self::SEPARATOR))
         && filter_input(INPUT_SERVER, self::SERVER_REDIRECT_URL)) {           
           foreach (explode("&", $this->query) as $value) {
               foreach (explode("=", $value) as $value) {
                   $redirect = str_replace(
                       urldecode($value),
                       $value,
                       $redirect);
               }
           }
       }
       return $redirect;
   }

   /**
    * Get uri path
    *
    * @return string uri path
    */
   public final function getPath(): string
   {
       return !$this->redirect ? parent::getPath() : $this->redirect;
   }

   /**
    * Get an instance for uri path
    *
    * @param string $path uri path
    * @return UriInterface for uri path
    *
    * @throws InvalidArgumentException
    */
   public final function withPath($path): UriInterface
   {
       try {
           $uri = parent::withPath($path);
       } catch (InvalidArgumentException $e) {
           throw $e;
       }
       if (isset($uri->redirect)) {
           $uri->redirect = "";
       }
       return $uri;
   }

   /**
    * Get UriInterface to string
    *
    * @return string uri to string
    */
   public final function __toString()
   {
       $uri = parent::__toString();
       return $this->redirect
            ? (explode($this->host, $uri)[0])
            . $this->host
            . self::SEPARATOR
            . $this->redirect
            : $uri;
   }

}
