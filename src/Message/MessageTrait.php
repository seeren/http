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
        $protocol = MessageInterface::PROTOCOL;
        if (MessageInterface::VERSION_1 === $version) {
            $protocol .= MessageInterface::VERSION_1;
        } elseif (MessageInterface::VERSION_2 === $version) {
            $protocol .= MessageInterface::VERSION_2;
        } else {
            $protocol .= MessageInterface::VERSION_0;
        }
        return $protocol;
    }

    /**
     * @param string $headerName
     * @return string
     */
    private function parseHeaderName(string $headerName): string
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
    private function parseHeaderValue($headerValue): array
    {
        $values = [];
        if (is_string($headerValue) && '' !== $headerValue) {
            foreach (explode(';', $headerValue) as $value) {
                $values[] = trim($value);
            }
        } else if (is_array($headerValue)) {
            foreach ($headerValue as $value) {
                $values[] = $this->parseHeaderValue($value);
            }
        }
        return $values;
    }

}
