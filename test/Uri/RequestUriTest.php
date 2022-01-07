<?php

namespace Seeren\Http\Test\Uri;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Uri\RequestUri;

class RequestUriTest extends TestCase
{

    public function getMock(): object
    {
        return (new ReflectionClass(RequestUri::class))->newInstance();
    }

    /**
     * @covers \Seeren\Http\Uri\RequestUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testPathInfo(): void
    {
        $this->assertEquals('https://host:8000/info?foo=bar', (string)$this->getMock());
    }

    /**
     * @covers \Seeren\Http\Uri\RequestUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testRedirectUri(): void
    {
        $this->assertEquals('https://host:8000/redirect?foo=bar', (string)$this->getMock());
    }

    /**
     * @covers \Seeren\Http\Uri\RequestUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testRequestUri(): void
    {
        $this->assertEquals('https://host:8000/path?foo=bar', (string)$this->getMock());
    }

}

namespace Seeren\Http\Uri;

function filter_input(
    int $type,
    string $key,
    int $flag = null,
    array $options = null)
{
    static $called = 0;
    if (5 === $type) {
        if ('REQUEST_SCHEME' === $key) {
            return 'https';
        } elseif ('REMOTE_USER' === $key) {
            return null;
        } elseif ('SERVER_PORT' === $key) {
            return 8000;
        } elseif ('SERVER_NAME' === $key) {
            return 'host';
        } elseif ($called === 0 && 'PATH_INFO' === $key) {
            $called++;
            return 'info';
        } elseif ($called === 1 && 'REDIRECT_URL' === $key) {
            $called++;
            return 'redirect';
        } elseif ('REQUEST_URI' === $key) {
            return 'path';
        } elseif ('QUERY_STRING' === $key) {
            return 'foo=bar';
        }
    }
    return null;
}
