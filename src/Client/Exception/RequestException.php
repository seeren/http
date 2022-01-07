<?php

namespace Seeren\Http\Client\Exception;

use Psr\Http\Client\RequestExceptionInterface;

class RequestException extends ClientException implements RequestExceptionInterface
{
}
