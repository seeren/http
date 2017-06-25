<?php

/**
 * This file contain Seeren\Http\Test\Request\AbstractServerRequestTest class
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

namespace Seeren\Http\Test\Request;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Seeren\Http\Upload\UploadedFile;
use ReflectionClass;
use stdClass;

/**
 * Class for test ServerRequestInterface
 * 
 * @category Seeren
 * @package Http
 * @subpackage Test\Request
 * @abstract
 */
abstract class AbstractServerRequestTest extends AbstractRequestTest
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
     * Provide invalid uploaded file
     */
    public final function provideInvalidUploadedFile()
    {
        return [
            [[new stdClass()]],
            [[[]]]
        ];
    }

    /**
     * Provide parsed body
     */
    public final function provideParsedBody()
    {
        $std = new stdClass();
        $std->foo = "value";
        $std->bar = ["value"];
        return [
            [[
                "foo" => "value",
                "bar" => ["value"]
            ]],
            [$std]
        ];
    }

    /**
     * Provide invalid parsed body
     */
    public final function provideInvalidParsedBody()
    {
        return [
            [true],
            [1],
            [""],
        ];
    }

    /**
     * Test get server params
     */
    public function testGetServerParams()
    {
        $this->assertTrue(
            is_array($this->getRequest()->getServerParams())
        );
    }

    /**
     * Test with query params
     */
    public function testWithCookieParams()
    {
        $params = current(current($this->provideParsedBody()));
        $this->assertTrue(
            $this->getRequest()
            ->withCookieParams($params)
            ->getCookieParams() === $params
       );
    }

    /**
     * Test with query params
     */
    public function testWithQueryParams()
    {
        $params = current(current($this->provideParsedBody()));
        $this->assertTrue(
            $this->getRequest()
            ->withQueryParams($params)
            ->getQueryParams() === $params
       );
    }

    /**
     * Test with uploaded files
     */
    public function testWithUploadedFiles()
    {
        $this->assertTrue(
            $this->getRequest()
            ->withUploadedFiles([
                (new ReflectionClass(UploadedFile::class))
                ->newInstanceArgs([[]])
            ])
            ->getUploadedFiles() !== []
        );
    }

    /**
     * Test with uploaded files invalid argument exception
     */
    public function testWithUploadedFilesInvalidArgumentException(
        array $uploadedFiles)
    {
        $this->getRequest()->withUploadedFiles($uploadedFiles);
    }

    /**
     * Test with parsed body
     */
    public function testWithParsedBody($body)
    {
        $this->assertTrue(
            $this
            ->getRequest()
            ->withparsedBody($body)
            ->getParsedBody()
        === [
                "foo" => "value",
                "bar" => ["value"]
            ]
        );
        
    }

    /**
     * Test with parsed body invalid argument exception
     */
    public function testWithParsedBodyInvalidArgumentException($body)
    {
        $this->getRequest()->withparsedBody($body);
    }

    /**
     * Test attributes
     */
    public function testAttributes()
    {
        $request = $this->getRequest()->withAttribute("foo", true);
        $this->assertTrue(
            $request->getAttribute("foo")
        !== $request->withAttribute("foo", false)->getAttribute("foo")
        && $request->withoutAttribute("foo")->getAttribute("foo")
        === null
        && $request->withoutAttribute("foo")->getAttributes()
        === []
        );
    }

}
