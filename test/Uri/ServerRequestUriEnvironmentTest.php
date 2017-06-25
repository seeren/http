<?php

/**
 * This file contain Seeren\Http\Test\Uri\ServerRequestUriEnvironment class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.1
 */

namespace Seeren\Http\Test\Uri
{

    use Psr\Http\Message\UriInterface;
    use Seeren\Http\Uri\ServerRequestUri;
    use ReflectionClass;
    
    /**
     * Class for test ServerRequestUri
     * 
     * @category Seeren
     * @package Http
     * @subpackage Test\Uri
     * @final
     */
    final class ServerRequestUriEnvironment extends \PHPUnit\Framework\TestCase
    {
    
       /**
        * Get UriInterface
        *
        * @return UriInterface uri
        */
       private function getUri(): UriInterface
       {
           return (new ReflectionClass(ServerRequestUri::class))
           ->newInstanceArgs([])
           ->withScheme("http")
           ->withHost("host")
           ->withQuery("foo=bar&bar=baz");
       }

       /**
        * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
        * @covers \Seeren\Http\Uri\AbstractUri::__construct
        * @covers \Seeren\Http\Uri\AbstractUri::parseHost
        * @covers \Seeren\Http\Uri\AbstractUri::parsePath
        * @covers \Seeren\Http\Uri\AbstractUri::parsePort
        * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
        * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
        * @covers \Seeren\Http\Uri\AbstractUri::with
        * @covers \Seeren\Http\Uri\AbstractUri::withHost
        * @covers \Seeren\Http\Uri\AbstractUri::withPath
        * @covers \Seeren\Http\Uri\AbstractUri::withScheme
        * @covers \Seeren\Http\Uri\AbstractUri::withQuery
        * @covers \Seeren\Http\Uri\ServerRequestUri::getPath
        * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
        */
       public function testGetPath()
       {       
           $this->assertTrue($this->getUri()->getPath() === "foo/bar/baz/");
       }

       /**
        * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
        * @covers \Seeren\Http\Uri\AbstractUri::__construct
        * @covers \Seeren\Http\Uri\AbstractUri::__toString
        * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
        * @covers \Seeren\Http\Uri\AbstractUri::parseHost
        * @covers \Seeren\Http\Uri\AbstractUri::parsePath
        * @covers \Seeren\Http\Uri\AbstractUri::parsePort
        * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
        * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
        * @covers \Seeren\Http\Uri\AbstractUri::with
        * @covers \Seeren\Http\Uri\AbstractUri::withHost
        * @covers \Seeren\Http\Uri\AbstractUri::withPath
        * @covers \Seeren\Http\Uri\AbstractUri::withQuery
        * @covers \Seeren\Http\Uri\AbstractUri::withScheme
        * @covers \Seeren\Http\Uri\ServerRequestUri::__toString
        * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
        */
       public function testToString()
       {
           $this->assertTrue((string)
               $this->getUri() === "http://host/foo/bar/baz/");
       }

    }

}

namespace Seeren\Http\Uri
{

    function filter_input($type, $variable_name, $filter = null, $options = [])
    {
        if ($type === INPUT_SERVER) {
            if ("REDIRECT_URL" === $variable_name) {
                return true;
            } else if ("REQUEST_URI" === $variable_name) {
                return "/foo/bar/baz/";
            }
         }
         return \filter_input($type, $variable_name, $filter, $options);
    }
    
}
