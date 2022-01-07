<?php

namespace Seeren\Http\Client;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Seeren\Http\Request\AbstractRequest;

class ClientRequest extends AbstractRequest
{

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
