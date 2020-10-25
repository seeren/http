<?php

namespace Seeren\Http\Client\Exception;

use Psr\Http\Client\NetworkExceptionInterface;

/**
 * Class to represent a network exception
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Client\Exception
 */
class NetworkException extends RequestException implements NetworkExceptionInterface
{
}
