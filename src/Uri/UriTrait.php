<?php

namespace Seeren\Http\Uri;

use InvalidArgumentException;

/**
 * Trait to parse a generic URI
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Uri
 */
trait UriTrait
{

    /**
     * @param string $scheme
     * @return string
     *
     * @throws InvalidArgumentException
     */
    private function scheme(string $scheme): string
    {
        if ($scheme !== static::SCHEME_HTTP && $scheme !== static::SCHEME_HTTPS) {
            throw new InvalidArgumentException('Scheme "' . $scheme . '" is not supported');
        }
        return $scheme;
    }

    /**
     * @param string $host
     * @return string
     *
     * @throws InvalidArgumentException
     */
    private function host(string $host): string
    {
        if (!preg_match('/^([a-z0-9-_.])+$/', $host)) {
            throw new InvalidArgumentException('Host: "' . $host . '" is invalid');
        }
        return $host;
    }

    /**
     * @param int|null $port
     * @return int|null
     *
     * @throws InvalidArgumentException
     */
    private function port(int $port = null): ?int
    {
        if ($port && (0 > $port || 63737 <= $port)) {
            throw new InvalidArgumentException('Port: "' . $port . '" out of range');
        }
        return $port;
    }

    /**
     * @param string $path
     * @return string
     *
     * @throws InvalidArgumentException
     */
    private function path(string $path): string
    {
        if ($path && !preg_match('#^[-_./\w]+$#', $path)) {
            throw new InvalidArgumentException('Path: "' . $path . '" is invalid');
        }
        return trim($path, '/');
    }

    /**
     * @param string $query
     * @return string
     *
     * @throws InvalidArgumentException
     */
    private function query(string $query): string
    {
        if (!$query) {
            return $query;
        }
        $params = [];
        $query = rtrim($query, '=');
        foreach (explode('&', $query) as $value) {
            $value = explode('=', $value, 2);
            $params[urldecode($value[0])] = array_key_exists(1, $value) ? urldecode($value[1]) : '';
        }
        if (($buildQuery = rtrim(http_build_query($params), '=')) !== $query) {
            throw new InvalidArgumentException('QueryString "' . $query . '" is invalid');
        }
        return $buildQuery;
    }

}