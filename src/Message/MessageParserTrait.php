<?php

namespace Seeren\Http\Message;

trait MessageParserTrait
{

    private function parseProtocol(string $version): string
    {
        if (MessageInterface::VERSION_1 !== $version && MessageInterface::VERSION_2 !== $version) {
            $version = MessageInterface::VERSION_0;
        }
        return MessageInterface::PROTOCOL . $version;
    }

    protected function parseHeaderName(string $headerName): string
    {
        $keys = [];
        foreach (explode('-', $headerName) as $value) {
            $keys[] = ucfirst(strtolower($value));
        }
        return implode('-', $keys);
    }

    protected function parseHeaderValue(string $headerValue): array
    {
        $values = [];
        foreach (explode(';', $headerValue) as $value) {
            $values[] = trim($value);
        }
        return $values;
    }

}
