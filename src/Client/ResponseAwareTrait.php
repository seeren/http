<?php

namespace Seeren\Http\Client;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Seeren\Http\Response\Response;

trait ResponseAwareTrait
{

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
