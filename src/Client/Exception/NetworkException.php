<?php

namespace Seeren\Http\Client\Exception;

use Psr\Http\Client\NetworkExceptionInterface;

class NetworkException extends RequestException implements NetworkExceptionInterface
{
}
