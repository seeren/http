<?php

namespace Seeren\Http\Request;

/**
 * Trait to help request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Request
 */
trait RequestTrait
{

    /**
     * @param string $method
     * @return string
     */
    private function parseMethod(string $method): string
    {
        return RequestInterface::GET === $method
        || RequestInterface::HEAD === $method
        || RequestInterface::POST === $method
        || RequestInterface::PUT === $method
        || RequestInterface::DELETE === $method
        || RequestInterface::CONNECT === $method
        || RequestInterface::OPTIONS === $method
        || RequestInterface::TRACE === $method
        || RequestInterface::PATCH === $method
            ? $method
            : RequestInterface::GET;
    }

}
