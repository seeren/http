<?php

namespace Seeren\Http\Client\Exception;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Throwable;

class ClientException extends Exception implements ClientExceptionInterface
{

    public function __construct(private RequestInterface $request, $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

}
