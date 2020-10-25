<?php

namespace Seeren\Http\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Seeren\Http\Client\Exception\NetworkException;
use Seeren\Http\Client\Exception\RequestException;
use Seeren\Http\Stream\Stream;

/**
 * Class to represent a client
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Client
 */
class Client implements ClientInterface
{

    use ClientTrait;

    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * @param string $method
     * @param UriInterface $uri
     * @param array $headers
     * @param string|null $body
     * @param string $protocol
     */
    public function __construct(
        string $method,
        UriInterface $uri,
        array $headers = [],
        string $body = '',
        string $protocol = '1.1')
    {
        $stream = new Stream('php://temp', Stream::MODE_R_MORE);
        $stream->write($body);
        $this->request = new ClientRequest($method, $uri, $headers, $stream, $protocol);
    }

    /**
     * {@inheritDoc}
     * @see ClientInterface::sendRequest()
     */
    public function sendRequest(RequestInterface $request = null): ResponseInterface
    {
        $request = $request ?? $this->request;
        if (!$request->getMethod()
            || !$request->getUri()->getScheme()
            || !$request->getUri()->getHost()
            || !$request->getBody()->isSeekable()
            || !$request->getBody()->isReadable()) {
            throw new RequestException($request);
        }
        $request->getBody()->rewind();
        $stream = new Stream('php://temp', Stream::MODE_R_MORE);
        $stream->write(@file_get_contents((string)$request->getUri(), false, stream_context_create(['http' => [
            'protocol_version' => $request->getProtocolVersion(),
            'method' => $request->getMethod(),
            'ignore_errors' => true,
            'header' => $this->parseHeader($request),
            'content' => (string)$request->getBody(),
        ]])));
        if (!isset($http_response_header)) {
            throw new NetworkException($request);
        }
        return $this->getResponse($stream, $http_response_header);
    }

}
