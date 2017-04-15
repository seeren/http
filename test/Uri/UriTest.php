<?php

/**
 * This file contain Seeren\Http\Test\Uri\UriTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Http\Test\Uri;

use Psr\Http\Message\UriInterface;
use Seeren\Http\Uri\Uri;

/**
 * Class for test Uri
 * 
 * @category Seeren
 * @package Http
 * @subpackage Uri\Test
 * @final
 */
final class UriTest extends UriInterfaceTest
{

   /**
    * Get UriInterface
    *
    * @return UriInterface uri
    */
   protected final function getUri(): UriInterface
   {
       return $this->createMock(Uri::class, [], ["http", "host", "path"]);
   }

}
