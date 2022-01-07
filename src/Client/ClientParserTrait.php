<?php

namespace Seeren\Http\Client;

use Psr\Http\Message\RequestInterface;

trait ClientParserTrait
{

    private function parseHeader(RequestInterface $request): string
    {
        $header = '';
        foreach (array_keys($request->getHeaders()) as $key) {
            $header .= $key . ": " . $request->getHeaderLine($key) . "\r\n";
        }
        return $header;
    }

}
