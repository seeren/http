<?php

namespace Seeren\Http\Response;

use Psr\Http\Message\StreamInterface;
use Seeren\Http\Message\AbstractMessage;
use InvalidArgumentException;

/**
 * Class to represent a response
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Response
 */
class Response extends AbstractMessage implements ResponseInterface
{

    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var string
     */
    private string $reasonPhrase;

    /**
     * @param StreamInterface $stream
     * @param string $version
     */
    public function __construct(StreamInterface $stream, string $version = '1.1')
    {
        parent::__construct($version, [], $stream);
        $this->setStatus(200);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return ResponseInterface
     */
    private function with(string $name, $value): ResponseInterface
    {
        $clone = clone $this;
        $clone->{$name} = $value;
        return $clone;
    }

    /**
     * @param int $code
     * @throws InvalidArgumentException
     */
    private function setStatus(int $code)
    {
        $const = 'self::STATUS_' . $code;
        if (!defined($const)) {
            throw new InvalidArgumentException('Can\'t set status code "' . $code . '"');
        }
        $this->statusCode = $code;
        $this->reasonPhrase = constant($const);
    }

    /**
     * {@inheritDoc}
     * @see ResponseInterface::getStatusCode()
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritDoc}
     * @see ResponseInterface::withStatus()
     */
    public function withStatus($code, $reasonPhrase = null): ResponseInterface
    {
        $response = $this->with('statusCode', $code);
        $response->setStatus((int)$code);
        return $response;
    }

    /**
     * {@inheritDoc}
     * @see ResponseInterface::getReasonPhrase()
     */
    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

}
