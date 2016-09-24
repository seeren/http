<?php

/**
 * This file contain Seeren\Http\Test\Uri\ServerRequestUriTest class
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

namespace Seeren\Http\Test\Uri;

use Psr\Http\Message\UriInterface;
use Seeren\Http\Uri\ServerRequestUri;
use ReflectionClass;

/**
 * Class for test ServerRequestUri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri\Test
 * @final
 */
final class ServerRequestUriTest extends UriInterfaceTest
{

   /**
    * Get UriInterface
    *
    * @return UriInterface uri
    */
   protected final function getUri(): UriInterface
   {
       return (new ReflectionClass(ServerRequestUri::class))
              ->newInstanceArgs([]);
   }

}
