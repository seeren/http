<?php

namespace Seeren\Http\Test\Request {

    use InvalidArgumentException;
    use PHPUnit\Framework\TestCase;
    use ReflectionClass;
    use Seeren\Http\Request\Request;
    use Seeren\Http\Stream\RequestStream;
    use Seeren\Http\Upload\UploadedFile;
    use Seeren\Http\Uri\Uri;
    use stdClass;

    class RequestTest extends TestCase
    {

        /**
         * @return object
         */
        public function getMock(): object
        {
            return (new ReflectionClass(Request::class))->newInstance(
                new RequestStream(),
                new Uri('http', 'host', 'path', 'param=value')
            );
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::getServerParams
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testGetServerParams(): void
        {
            $this->assertIsArray($this->getMock()->getServerParams());
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::getCookieParams
         * @covers \Seeren\Http\Request\Request::with
         * @covers \Seeren\Http\Request\Request::withCookieParams
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithCookieParams(): void
        {
            $cookies = ['foo' => 'bar'];
            $this->assertEquals($cookies, $this->getMock()->withCookieParams($cookies)->getCookieParams());
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::getQueryParams
         * @covers \Seeren\Http\Request\Request::with
         * @covers \Seeren\Http\Request\Request::withQueryParams
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithQueryParams(): void
        {
            $params = ['foo' => 'bar'];
            $this->assertEquals($params, $this->getMock()->withQueryParams($params)->getQueryParams());
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::getUploadedFiles
         * @covers \Seeren\Http\Request\Request::with
         * @covers \Seeren\Http\Request\Request::withUploadedFiles
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithUploadedFiles(): void
        {
            $files = [new UploadedFile([])];
            $this->assertEquals($files, $this->getMock()->withUploadedFiles($files)->getUploadedFiles());
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::withUploadedFiles
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithUploadedFilesExceptions(): void
        {
            $files = [new stdClass()];
            $this->expectException(InvalidArgumentException::class);
            $this->getMock()->withUploadedFiles($files);
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::getParsedBody
         * @covers \Seeren\Http\Request\Request::with
         * @covers \Seeren\Http\Request\Request::withParsedBody
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithParsedBody(): void
        {
            $body = new stdClass();
            $body->foo = 'bar';
            $this->assertEquals('bar', $this->getMock()->withParsedBody($body)->getParsedBody()['foo']);
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::withParsedBody
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithParsedBodyException(): void
        {
            $body = 'body';
            $this->expectException(InvalidArgumentException::class);
            $this->getMock()->withParsedBody($body);
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::getAttribute
         * @covers \Seeren\Http\Request\Request::getAttributes
         * @covers \Seeren\Http\Request\Request::with
         * @covers \Seeren\Http\Request\Request::withAttribute
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithAttribute(): void
        {
            $clone = $this->getMock()->withAttribute('foo', 'bar');
            $this->assertTrue(
                'bar' === $clone->getAttributes()['foo']
                && 'bar' === $clone->getAttribute('foo')
                && 'baz' === $clone->getAttribute('bar', 'baz')
            );
        }

        /**
         * @covers \Seeren\Http\Message\AbstractMessage::__construct
         * @covers \Seeren\Http\Message\AbstractMessage::getHeader
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderName
         * @covers \Seeren\Http\Message\MessageTrait::parseHeaderValue
         * @covers \Seeren\Http\Message\MessageTrait::parseProtocol
         * @covers \Seeren\Http\Request\AbstractRequest::__construct
         * @covers \Seeren\Http\Request\Request::__construct
         * @covers \Seeren\Http\Request\Request::getAttribute
         * @covers \Seeren\Http\Request\Request::getAttributes
         * @covers \Seeren\Http\Request\Request::with
         * @covers \Seeren\Http\Request\Request::withAttribute
         * @covers \Seeren\Http\Request\Request::withoutAttribute
         * @covers \Seeren\Http\Request\RequestTrait::parseMethod
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseCookie
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseParsedBody
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseQueryParam
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeader
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseUploadedFiles
         * @covers \Seeren\Http\Request\ServerRequestTrait::parseRequestHeaderValue
         * @covers \Seeren\Http\Stream\RequestStream::__construct
         * @covers \Seeren\Http\Stream\Stream::__construct
         * @covers \Seeren\Http\Stream\Stream::__toString
         * @covers \Seeren\Http\Stream\Stream::getContents
         * @covers \Seeren\Http\Stream\Stream::getMetadata
         * @covers \Seeren\Http\Stream\Stream::isReadable
         * @covers \Seeren\Http\Stream\Stream::isSeekable
         * @covers \Seeren\Http\Stream\Stream::isWritable
         * @covers \Seeren\Http\Stream\Stream::rewind
         * @covers \Seeren\Http\Stream\Stream::write
         * @covers \Seeren\Http\Uri\AbstractUri::__construct
         * @covers \Seeren\Http\Uri\AbstractUri::getQuery
         * @covers \Seeren\Http\Uri\Uri::__construct
         * @covers \Seeren\Http\Uri\UriTrait::host
         * @covers \Seeren\Http\Uri\UriTrait::path
         * @covers \Seeren\Http\Uri\UriTrait::port
         * @covers \Seeren\Http\Uri\UriTrait::query
         * @covers \Seeren\Http\Uri\UriTrait::scheme
         * @covers \Seeren\Http\Upload\UploadedFile::__construct
         */
        public function testWithoutAttribute(): void
        {
            $clone = $this->getMock()->withAttribute('foo', 'bar');
            $this->assertTrue(
                'bar' === $clone->getAttributes()['foo']
                && 'baz' === $clone->withoutAttribute('foo')->getAttribute('foo', 'baz')
            );
        }

    }
}

namespace {

    function apache_request_headers(): array
    {
        return [
            "Content-Type" => "application/json",
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0",
        ];
    }

    $_FILES = array(
        'foo' =>
            array(
                'name' => '',
                'type' => '',
                'tmp_name' => '',
                'error' => 4,
                'size' => 0,
            ),
        'bar' => array(
            'name' => array(
                0 => '',
                1 => '',
            ),
            'type' => array(
                0 => '',
                1 => '',
            ),
            'tmp_name' => array(
                0 => '',
                1 => '',
            ),
            'error' => array(
                0 => 4,
                1 => 4,
            ),
            'size' => array(
                0 => 0,
                1 => 0,
            )
        )
    );


}

namespace Seeren\Http\Request {

    function filter_input_array(int $type): array
    {
        if (INPUT_SERVER === $type) {
            return [
                "HTTP_CONTENT_TYPE" => "application/json",
                "HTTP_COOKIE" => "foo=bar",
            ];
        }
        return [];
    }

}
