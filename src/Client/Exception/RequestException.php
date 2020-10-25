<?php

namespace Seeren\Http\Client\Exception;

use Psr\Http\Client\RequestExceptionInterface;

/**
 * Class to represent a request exception
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Client\Exception
 */
class RequestException extends ClientException implements RequestExceptionInterface
{
}
