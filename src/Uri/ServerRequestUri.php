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
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Http\Uri;

/**
 * Class for represent server request uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri
 */
class ServerRequestUri extends AbstractUri implements ServerRequestUriInterface
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
       $redirect = "";
       if (filter_input(INPUT_SERVER, self::SERVER_REDIRECT_URL)) {
           $redirect = (string) filter_input(
               INPUT_SERVER,
               self::SERVER_REQUEST_URI);
           foreach (explode("&", $this->query) as $value) {
               foreach (explode("=", $value) as $value) {
                   $redirect = str_replace(
                       urldecode($value), $value, $redirect);
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
       $path = parent::getPath();
       return $this->redirect !== "" && $this->redirect !== $path
            ? $this->redirect
            : $path;
   }

   /**
    * Get UriInterface to string
    *
    * @return string uri ti string
    */
   public final function __toString()
   {
       $uri = parent::__toString();
       var_dump($uri);
       return "" !== $this->redirect
            ? ((explode($this->path, $uri))[0] . ltrim($this->redirect, "/"))
            : $uri;
   }

}