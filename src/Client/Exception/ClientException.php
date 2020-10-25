<?php

namespace Seeren\Http\Client\Exception;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Throwable;

/**
 * Class to represent a client exception
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Client\Exception
 */
class ClientException extends Exception implements ClientExceptionInterface
{

    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    public function __construct($request, $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->request = $request;
    }

    /**
     * {@inheritDoc}
     * @see RequestExceptionInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

}
