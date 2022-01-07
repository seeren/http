<?php

namespace Seeren\Http\Request;

use Seeren\Http\Upload\UploadedFile;
use Seeren\Http\Upload\UploadedFileInterface;

trait ServerRequestParserTrait
{

    private function parseRequestHeader(): array
    {
        $headers = [];
        if (function_exists('apache_request_headers')) {
            foreach (apache_request_headers() as $key => $value) {
                $headers[$key] = $this->parseRequestHeaderValue($key, $value);
            }
        }
        foreach (filter_input_array(INPUT_SERVER) as $key => $value) {
            if (str_starts_with($key, 'HTTP_')) {
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

    private function parseRequestHeaderValue(string $key, string $value): array
    {
        return 'User-Agent' === $key ? [$value] : $this->parseHeaderValue($value);
    }

    private function parseCookie(): array
    {
        $cookies = [];
        foreach ($this->getHeader('Cookie') as $value) {
            $value = explode('=', $value);
            $key = $value[0];
            $cookieValue = '';
            if (array_key_exists(1, $value)) {
                $cookieValue .= $value[1];
            }
            $cookies[$key] = $cookieValue;
        }
        return $cookies;
    }

    private function parseQueryParam(string $queryString): array
    {
        $queryParams = [];
        if ($queryString) {
            parse_str($queryString, $queryParams);
        }
        return $queryParams;
    }

    private function parseUploadedFiles(): array
    {
        $uploadedFiles = [];
        foreach ($_FILES as $key => $file) {
            if (is_array(current($file))) {
                $uploadedFiles[$key] = [];
                foreach (array_keys($file[UploadedFileInterface::NAME]) as $subkey) {
                    $uploadedFiles[$key][$subkey] = new UploadedFile([
                        UploadedFileInterface::NAME => $file[UploadedFileInterface::NAME][$subkey],
                        UploadedFileInterface::TYPE => $file[UploadedFileInterface::TYPE][$subkey],
                        UploadedFileInterface::TMP => $file[UploadedFileInterface::TMP][$subkey],
                        UploadedFileInterface::ERROR => $file[UploadedFileInterface::ERROR][$subkey],
                        UploadedFileInterface::SIZE => $file[UploadedFileInterface::SIZE][$subkey]
                    ]);
                }
                continue;
            }
            $uploadedFiles[$key] = new UploadedFile($file);
        }
        return $uploadedFiles;
    }

    private function parseParsedBody(string $body): array
    {
        if (!$parsedBody = json_decode($body, true)) {
            parse_str($body, $parsedBody);
        }
        return $parsedBody;
    }

}
