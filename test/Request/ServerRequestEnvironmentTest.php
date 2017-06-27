<?php

/**
 * This file contain Seeren\Http\Test\Request\ServerRequestEnvironment class
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

    use Psr\Http\Message\UploadedFileInterface;
    use Psr\Http\Message\ServerRequestInterface;
    use Seeren\Http\Request\ServerRequest;
    use Seeren\Http\Stream\ServerRequestStream;
    use Seeren\Http\Uri\ServerRequestUri;
    use ReflectionClass;
                    
    /**
     * Class for test ServerRequest
     * 
     * @category Seeren
     * @package Http
     * @subpackage Test\Request
     * @final
     */
    final class ServerRequestEnvironmentTest extends \PHPUnit\Framework\TestCase
    {

        /**
         * Get ServerRequestInterface
         *
         * @return ServerRequestInterface request
         */
        private function getServerRequest(): ServerRequestInterface
        {
            return (new ReflectionClass(ServerRequest::class))
                ->newInstanceArgs([
                    (new ReflectionClass(ServerRequestStream::class))
                    ->newInstanceArgs([]),
                    (new ReflectionClass(ServerRequestUri::class))
                    ->newInstanceArgs([]),
            ]);
        }

        /**
         * @covers \Seeren\Http\Request\ServerRequest::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
         * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
         * @covers \Seeren\Http\Request\ServerRequest::parseCookie
         * @covers \Seeren\Http\Request\ServerRequest::parseHeader
         * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
         * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
         * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::setReadableWritable
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseHost
         * @covers \Seeren\Http\Uri\AbstractUri::parsePath
         * @covers \Seeren\Http\Uri\AbstractUri::parsePort
         * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
         * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
         * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
         */
        public function testGetHeader()
        {
            $request = $this->getServerRequest();
            $this->assertTrue(
                $request->getHeader("X-XSS-Protection") === ["1", "mode=block"]
             && $request->getHeader("User-Agent") === ["agent"] 
            );
        }

        /**
         * @covers \Seeren\Http\Request\ServerRequest::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
         * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
         * @covers \Seeren\Http\Request\ServerRequest::getCookieParams
         * @covers \Seeren\Http\Request\ServerRequest::parseCookie
         * @covers \Seeren\Http\Request\ServerRequest::parseHeader
         * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
         * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
         * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::setReadableWritable
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseHost
         * @covers \Seeren\Http\Uri\AbstractUri::parsePath
         * @covers \Seeren\Http\Uri\AbstractUri::parsePort
         * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
         * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
         * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
         */
        public function testGetCookieParams()
        {
            $this->assertTrue(
                $this
                ->getServerRequest()
                ->getCookieParams()
                === [
                    "key" => "value=value",
                    "otherkey" => "",
            ]);
        }

        /**
         * @covers \Seeren\Http\Request\ServerRequest::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
         * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
         * @covers \Seeren\Http\Request\ServerRequest::getUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequest::parseCookie
         * @covers \Seeren\Http\Request\ServerRequest::parseHeader
         * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
         * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
         * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::setReadableWritable
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseHost
         * @covers \Seeren\Http\Uri\AbstractUri::parsePath
         * @covers \Seeren\Http\Uri\AbstractUri::parsePort
         * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
         * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
         * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
         */
        public function testGetUploadedFiles()
        {
            $request = $this->getServerRequest();
            $this->assertTrue(
                $request
                ->getUploadedFiles()["foo"] instanceof  UploadedFileInterface
             && $request
                ->getUploadedFiles()["bar"][0] instanceof  UploadedFileInterface
             && $request
                ->getUploadedFiles()["bar"][1] instanceof  UploadedFileInterface
            );
        }

        /**
         * @covers \Seeren\Http\Request\ServerRequest::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderName
         * @covers \Seeren\Http\Message\AbstractMessage::parseHeaderValue
         * @covers \Seeren\Http\Message\AbstractMessage::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\AbstractRequest::parseMethod
         * @covers \Seeren\Http\Request\ServerRequest::parseCookie
         * @covers \Seeren\Http\Request\ServerRequest::parseHeader
         * @covers \Seeren\Http\Request\ServerRequest::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequest::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequest::parseServerHeaderValue
         * @covers \Seeren\Http\Request\ServerRequest::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequest::getParsedBody
         * @covers \Seeren\Http\Stream\ServerRequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::setReadableWritable
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseHost
         * @covers \Seeren\Http\Uri\AbstractUri::parsePath
         * @covers \Seeren\Http\Uri\AbstractUri::parsePort
         * @covers \Seeren\Http\Uri\AbstractUri::parseQuery
         * @covers \Seeren\Http\Uri\AbstractUri::parseScheme
         * @covers \Seeren\Http\Uri\ServerRequestUri::__construct
         * @covers \Seeren\Http\Uri\ServerRequestUri::parseRedirect
         */
        public function testGetParsedBody()
        {
            $this->assertTrue(
                $this
                ->getServerRequest()
                ->getParsedBody() === [
                    "foo" => "bar",
                    "bar" => "foo"
                ]
            );
        }

    }

}

namespace Seeren\Http\Request
{

    $_FILES = [
        "foo" => [
          "name" => "dummy",
          "type" => null,
          "tmp_name" => null,
          "size" => null,
          "error" => 0,
        ],
        "bar" => [
          "name" => ["dummy", "dummy"],
          "type" => [null, null],
          "tmp_name" => [null, null],
          "size" => [null, null],
          "error" => [0, 0],
        ] 
    ];

    function filter_input_array(
        $type,
        $filter = null,
        $options = [])
    {
        if ($type === INPUT_SERVER) {
            return [
                "HTTP_X_XSS_Protection" => "1; mode=block",
                "HTTP_USER_AGENT" => "agent",
                "HTTP_COOKIE" => "key=value=value; otherkey"
            ];
         }
         return \filter_input_array($type, $filter, $options);
    }

}

namespace Seeren\Http\Stream
{

    function fopen(
        $target,
        $mode,
        $use_include_path = false,
        $context = null)
    {
        if ($target === "php://input") {
           $stream = @fopen("php://temp", "r+");
           fwrite($stream, "foo=bar&bar[]=baz&bar[]=qux&bar=foo");
           rewind($stream);
           return $stream;
        } else if ($context) {
            return @\fopen($target, $mode, $use_include_path, $context);
        }
        return @\fopen($target, $mode);
    }

}
