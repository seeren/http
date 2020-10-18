<?php

namespace Seeren\Http\Request;

use Seeren\Http\Upload\UploadedFile;

/**
 * Trait to help server request
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Request
 */
trait ServerRequestTrait
{

    /**
     * @return array
     */
    private function parseRequestHeader(): array
    {
        $headers = [];
        if (function_exists('apache_request_headers')) {
            foreach (apache_request_headers() as $key => $value) {
                $headers[$key] = $this->parseRequestHeaderValue($key, $value);
            }
        }
        foreach (filter_input_array(INPUT_SERVER) as $key => $value) {
            if (0 === strpos($key, 'HTTP_')) {
                $key = str_replace(
                    ' ',
                    '-',
                    ucwords(str_replace('_', ' ', strtolower(substr($key, 5))))
                );
                if (!array_key_exists($key, $headers)) {
                    $headers[$key] = $this->parseRequestHeaderValue($key, $value);
                }
            }
        }
        return $headers;
    }

    /**
     * @param string $key
     * @param string $value
     * @return string[]
     */
    private function parseRequestHeaderValue(string $key, string $value): array
    {
        return "User-Agent" === $key ? [$value] : $this->parseHeaderValue($value);
    }

    /**
     * @return array
     */
    private function parseCookie(): array
    {
        $cookies = [];
        foreach ($this->getHeader('Cookie') as $values) {
            foreach ($values as $key => $value) {
                $value = explode('=', $value);
                $key = $value[0];
                $cookieValue = '';
                if (array_key_exists(1, $value)) {
                    $cookieValue .= $value[1];
                }
                $cookies[$key] = $cookieValue;
            }
        }
        return $cookies;
    }

    /**
     * @param string $queryString
     * @return array
     */
    private function parseQueryParam(string $queryString): array
    {
        $queryParams = [];
        if ($queryString) {
            parse_str($queryString, $queryParams);
        }
        return $queryParams;
    }

    /**
     * @return array
     */
    private function parseUploadedFiles(): array
    {
        $uploadedFiles = [];
        foreach ($_FILES as $key => $file) {
            if (is_array(current($file))) {
                $uploadedFiles[$key] = [];
                foreach (array_keys($file[UploadedFile::NAME]) as $subkey) {
                    $uploadedFiles[$key][$subkey] = new UploadedFile([
                        UploadedFile::NAME => $file[UploadedFile::NAME][$subkey],
                        UploadedFile::TYPE => $file[UploadedFile::TYPE][$subkey],
                        UploadedFile::TMP => $file[UploadedFile::TMP][$subkey],
                        UploadedFile::ERROR => $file[UploadedFile::ERROR][$subkey],
                        UploadedFile::SIZE => $file[UploadedFile::SIZE][$subkey]
                    ]);
                }
                continue;
            }
            $uploadedFiles[$key] = new UploadedFile($file);
        }
        return $uploadedFiles;
    }

    /**
     * @param string $body
     * @return array
     */
    private function parseParsedBody(string $body): array
    {
        if (null !== $json = json_decode($body, true)) {
            return $json;
        }
        parse_str($body, $parsedBody);
        return $parsedBody;
    }

}
