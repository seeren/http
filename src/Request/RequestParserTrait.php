<?php

namespace Seeren\Http\Request;

trait RequestParserTrait
{

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
