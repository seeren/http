<?php

namespace Seeren\Http\Test\Uri;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Uri\AbstractUri;

class AbstractUriTest extends TestCase
{

    /**
     * @return object
     */
    public function getMock(): object
    {
        return (new ReflectionClass(DummyUri::class))
            ->newInstanceArgs([
                'http',
                'host',
                'path',
                'param=value',
                'root:password',
                8000,
                'fragment'
            ]);
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testGetAuthority(): void
    {
        $this->assertEquals('root:password@host:8000', $this->getMock()->getAuthority());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getFragment
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testGetFragment(): void
    {
        $this->assertEquals('fragment', $this->getMock()->getFragment());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::withScheme
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getScheme
     */
    public function testWithScheme(): void
    {
        $this->assertEquals('https', $this->getMock()->withScheme('https')->getScheme());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::withScheme
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testWithSchemeException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withScheme('foo');
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::withUserInfo
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getUserInfo
     */
    public function testWithUserInfo(): void
    {
        $this->assertEquals('foo:bar', $this->getMock()->withUserInfo('foo', 'bar')->getUserInfo());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withHost
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getHost
     */
    public function testWithHost(): void
    {
        $this->assertEquals('foo', $this->getMock()->withHost('foo')->getHost());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withHost
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testWithHostException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withHost('f o o');
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPort
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getPort
     */
    public function testWithPort(): void
    {
        $this->assertEquals(3000, $this->getMock()->withPort(3000)->getPort());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPort
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testWithPortException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withPort(-3000);
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPath
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getPath
     */
    public function testWithPath(): void
    {
        $this->assertEquals('foo', $this->getMock()->withPath('foo')->getPath());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withPath
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testWithPathException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withPath('f o o');
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withQuery
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getQuery
     */
    public function testWithQuery(): void
    {
        $this->assertEquals('foo=bar', $this->getMock()->withQuery('foo=bar')->getQuery());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withQuery
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testWithQueryException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->withQuery([]);
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::with
     * @covers \Seeren\Http\Uri\AbstractUri::withFragment
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::getFragment
     */
    public function testWithFragment(): void
    {
        $this->assertEquals('foo', $this->getMock()->withFragment('foo')->getFragment());
    }

    /**
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     */
    public function testToString(): void
    {
        $this->assertEquals(
            'http://root:password@host:8000/path?param=value#fragment',
            (string)$this->getMock()
        );
    }

}

class DummyUri extends AbstractUri
{
    public function __construct(
        string $scheme,
        string $host,
        string $path = '',
        string $query = '',
        string $user = '',
        ?int $port = null,
        string $fragment = '')
    {
        parent::__construct(
            $scheme,
            $user,
            $host,
            $port,
            $path,
            $query,
            $fragment
        );
    }

}
