<?php

namespace Seeren\Http\Message;

/**
 * Class to help a message
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Message
 */
trait MessageTrait
{

    /**
     * @param string $version
     * @return string
     */
    private function parseProtocol(string $version): string
    {
        $protocol = MessageInterface::PROTOCOL . MessageInterface::VERSION_0;
        if (MessageInterface::VERSION_1 === $version) {
            $protocol = MessageInterface::PROTOCOL . MessageInterface::VERSION_1;
        } elseif (MessageInterface::VERSION_2 === $version) {
            $protocol = MessageInterface::PROTOCOL . MessageInterface::VERSION_2;
        }
        return $protocol;
    }

    /**
     * @param string $headerName
     * @return string
     */
    protected function parseHeaderName(string $headerName): string
    {
        $keys = [];
        foreach (explode('-', $headerName) as $value) {
            $keys[] = ucfirst(strtolower($value));
        }
        return implode('-', $keys);
    }

    /**
     * @param $headerValue
     * @return array
     */
    protected function parseHeaderValue(string $headerValue): array
    {
        $values = [];
        foreach (explode(';', $headerValue) as $value) {
            $values[] = trim($value);
        }
        return $values;
    }

}
