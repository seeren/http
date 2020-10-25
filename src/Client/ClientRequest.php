<?php

namespace Seeren\Http\Client;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Seeren\Http\Request\AbstractRequest;

/**
 * Class to represent a client request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Client
 */
class ClientRequest extends AbstractRequest
{

    /**
     * @param StreamInterface $stream
     * @param UriInterface $uri
     * @param string $method
     * @param string $protocol
     * @param array $header
     */
    public function __construct(
        string $method,
        UriInterface $uri,
        array $header,
        StreamInterface $stream,
        string $protocol)
    {
        parent::__construct($stream, $uri, $method, $protocol, $header);
    }

}
