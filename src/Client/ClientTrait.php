<?php

namespace Seeren\Http\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Seeren\Http\Response\Response;

/**
 * Class to help a client
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Client
 */
trait ClientTrait
{

    /**
     * @param RequestInterface $request
     * @return string
     */
    private function parseHeader(RequestInterface $request): string
    {
        $header = '';
        foreach (array_keys($request->getHeaders()) as $key) {
            $header .= $key . ": " . $request->getHeaderLine($key) . "\r\n";
        }
        return $header;
    }

    /**
     * @param StreamInterface $stream
     * @param array $http_response_header
     * @return ResponseInterface
     */
    private function getResponse(
        StreamInterface $stream,
        array $http_response_header): ResponseInterface
    {
        $stream->rewind();
        $status = explode(' ', $http_response_header[0]);
        array_shift($http_response_header);
        $headers = [];
        foreach ($http_response_header as $headerLine) {
            $header = explode(': ', $headerLine);
            $headers[$header[0]] = $header[1];
        }
        return new Response($stream, $headers, substr($status[0], 5), (int)$status[1], $status[2]);
    }

}
