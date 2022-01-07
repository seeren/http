<?php

namespace Seeren\Http\Response;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Message\AbstractMessage;
use InvalidArgumentException;

class Response extends AbstractMessage implements ResponseInterface
{

    public function __construct(
        StreamInterface $stream,
        array $headers = [],
        string $version = '1.1',
        private int $statusCode = 200,
        private string $reasonPhrase = 'OK'
    )
    {
        parent::__construct($version, $headers, $stream);
    }

    private function with(string $name, $value): ResponseInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    private function setStatus(int $code): void
    {
        $const = 'self::STATUS_' . $code;
        if (!defined($const)) {
            throw new InvalidArgumentException('Can\'t set status code "' . $code . '"');
        }
        $this->statusCode = $code;
        $this->reasonPhrase = constant($const);
    }


    public final function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public final function withStatus($code, $reasonPhrase = null): ResponseInterface
    {
        $response = $this->with('statusCode', $code);
        $response->setStatus((int)$code);
        return $response;
    }

    public final function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

}
