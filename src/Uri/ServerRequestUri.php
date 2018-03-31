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
 * @version 1.1.10
 */

namespace Seeren\Http\Uri;

use Psr\Http\Message\UriInterface as PsrUriInterface;
use InvalidArgumentException;

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
        * @var string
        */
       $redirect;

   /**
    * @constructor
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
    * @return string redirect uri
    */
   private final function parseRedirect(): string
   {
       return ($redirect = (string) filter_input(
                   INPUT_SERVER,
                   self::SERVER_REQUEST_URI))
            ? str_replace("?" . $this->query, "", $redirect)
            : "";
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Http\Uri\AbstractUri::getPath()
    */
   public final function getPath(): string
   {
       return ltrim((!$this->redirect
            ? parent::getPath()
            : $this->redirect), self::SEPARATOR);
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Http\Uri\AbstractUri::withPath()
    */
   public final function withPath($path): UriInterface
   {
       try {
           $uri = parent::withPath($path);
       } catch (InvalidArgumentException $e) {
           throw $e;
       }
       if ($uri->redirect) {
           $uri->redirect = "";
       }
       return $uri;
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Http\Uri\AbstractUri::__toString()
    */
   public final function __toString()
   {
       return str_replace(
           $this->path,
           ltrim($this->redirect, self::SEPARATOR),
           parent::__toString());
   }

}
