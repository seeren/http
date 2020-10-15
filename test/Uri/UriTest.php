<?php

namespace Seeren\Http\Test\Uri;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Uri\Uri;

class UriTest extends TestCase
{

    /**
     * @return object
     */
    public function getMock(): object
    {
        return (new ReflectionClass(Uri::class))
            ->newInstanceArgs([
                'http',
                'host'
            ]);
    }

    /**
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriTrait::host
     * @covers \Seeren\Http\Uri\UriTrait::path
     * @covers \Seeren\Http\Uri\UriTrait::port
     * @covers \Seeren\Http\Uri\UriTrait::query
     * @covers \Seeren\Http\Uri\UriTrait::scheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testToString(): void
    {
        $this->assertEquals('http://host', (string)$this->getMock());
    }

}
