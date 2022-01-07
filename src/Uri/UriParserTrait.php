<?php

namespace Seeren\Http\Uri;

use InvalidArgumentException;

trait UriParserTrait
{

    private function parseScheme(string $scheme): string
    {
        if ($scheme !== static::SCHEME_HTTP && $scheme !== static::SCHEME_HTTPS) {
            throw new InvalidArgumentException('Scheme "' . $scheme . '" is not supported');
        }
        return $scheme;
    }

    private function parseHost(string $host): string
    {
        if (!preg_match('/^([a-z0-9-_.])+$/', $host)) {
            throw new InvalidArgumentException('Host: "' . $host . '" is invalid');
        }
        return $host;
    }

    private function parsePort(int $port = null): ?int
    {
        if ($port && (0 > $port || 63737 <= $port)) {
            throw new InvalidArgumentException('Port: "' . $port . '" out of range');
        }
        return $port;
    }

    private function parsePath(string $path): string
    {
        if ($path && !preg_match('#^[-_./\w]+$#', $path)) {
            throw new InvalidArgumentException('Path: "' . $path . '" is invalid');
        }
        return trim($path, '/');
    }

    private function parseQuery(string $query): string
    {
        return urldecode($query);
    }

}
