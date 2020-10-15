<?php

namespace Seeren\Http\Test\Uri;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Uri\RequestUri;

class RequestUriTest extends TestCase
{

    /**
     * @return object
     */
    public function getMock(): object
    {
        return (new ReflectionClass(RequestUri::class))->newInstance();
    }

    /**
     * @covers \Seeren\Http\Uri\RequestUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testPathInfo(): void
    {
        $this->assertEquals('http://host/info', (string)$this->getMock());
    }

    /**
     * @covers \Seeren\Http\Uri\RequestUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testRedirectUri(): void
    {
        $this->assertEquals('http://host/redirect', (string)$this->getMock());
    }

    /**
     * @covers \Seeren\Http\Uri\RequestUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testRequestUri(): void
    {
        $this->assertEquals('http://host/path', (string)$this->getMock());
    }

}

namespace Seeren\Http\Uri;

/**
 * @param int $type
 * @param string $key
 * @param int|null $flag
 * @param array|null $options
 * @return mixed
 */
function filter_input(
    int $type,
    string $key,
    int $flag = null,
    array $options = null)
{
    static $called = 0;
    if (5 === $type) {
        if ('REQUEST_SCHEME' === $key) {
            return 'http';
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
        }
    }
    return \filter_input($type, $key, $flag, $options);
}
