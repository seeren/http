<?php

/**
 * This file contain Seeren\Http\Test\Request\ServerRequestInterfaceTest class
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

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Seeren\Http\Upload\UploadedFile;

/**
 * Class for test ServerRequestInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Request\Test
 * @abstract
 */
abstract class ServerRequestInterfaceTest extends RequestInterfaceTest
{

    /**
     * Get ServerRequestInterface
     *
     * @return ServerRequestInterface server request
     */
    abstract protected function getServerRequest(): ServerRequestInterface;

    /**
     * Get RequestInterface
     *
     * @return RequestInterface request
     */
    protected function getRequest(): RequestInterface
    {
        return $this->getServerRequest();
    }

    /**
     * Test ServerRequestInterface::withUploadedFiles Exceptions
     * 
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidUploadedFile
     */
    public final function testWithUploadedFilesExceptions(array $uploadedFiles)
    {
        $this->getRequest()->withUploadedFiles($uploadedFiles);
    }
    
    public final function provideInvalidUploadedFile()
    {
        return [
            [[$this->getMock(UploadedFile::class, [], [[]]), "invalid"]],
        ];
    }

    /**
     * Test ServerRequestInterface::withParsedBody Exceptions
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider provideInvalidParsedBody
     */
    public final function testWithParsedBodyExceptions($body)
    {
        $this->getRequest()->withparsedBody($body);
    }
    
    public final function provideInvalidParsedBody()
    {
        return [
            [true],
            [1],
            [""],
        ];
    }

    /**
     * Test ServerRequestInterface::withAttribute
     */
    public final function testWithAttribute()
    {
        $mock = $this->getRequest()->withAttribute("foo", true);
        $this->assertTrue(
            $mock->getAttribute("foo") !== $mock->withAttribute("foo", false)
        );
    }

}
