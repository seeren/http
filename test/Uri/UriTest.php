<?php

namespace Seeren\Http\Test\Uri;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Seeren\Http\Uri\Uri;

class UriTest extends TestCase
{

    public function getMock(): object
    {
        return (new ReflectionClass(Uri::class))
            ->newInstanceArgs([
                'https',
                'host'
            ]);
    }

    /**
     * @covers \Seeren\Http\Uri\Uri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::__construct
     * @covers \Seeren\Http\Uri\AbstractUri::getAuthority
     * @covers \Seeren\Http\Uri\UriParserTrait::parseHost
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePath
     * @covers \Seeren\Http\Uri\UriParserTrait::parsePort
     * @covers \Seeren\Http\Uri\UriParserTrait::parseQuery
     * @covers \Seeren\Http\Uri\UriParserTrait::parseScheme
     * @covers \Seeren\Http\Uri\AbstractUri::__toString
     */
    public function testToString(): void
    {
        $this->assertEquals('https://host', (string)$this->getMock());
    }

}
