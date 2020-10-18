# Seeren\Http

[![Build Status](https://travis-ci.org/seeren/http.svg?branch=master)](https://travis-ci.org/seeren/http) [![Coverage Status](https://coveralls.io/repos/github/seeren/http/badge.svg?branch=master)](https://coveralls.io/github/seeren/http?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/http.svg)](https://packagist.org/packages/seeren/http/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/http?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/http&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/http.svg)](https://packagist.org/packages/seeren/http#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

Manage http messages

## Installation

Seeren\Container is a [PSR-7 http messages interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md)) implementation

```
composer require seeren/http
```

## Seeren\Http\Uri\Uri

```php
use Seeren\Http\Uri\Uri;

$uri = new Uri('http', 'host');
```

## Seeren\Http\Stream

Handle resources

#### Seeren\Http\RequestStream

Handle input for all http methods

```php
use Seeren\Http\Stream\RequestStream;

$stream = new RequestStream();
$input = (string) $stream;
```

#### Seeren\Http\ResponseStream

Handle output

```php
use Seeren\Http\Stream\ResponseStream;

$stream = new ResponseStream();
$stream->write('Client output');
```

#### Seeren\Http\Stream

Handle input or output depending on stream mode

```php
use Seeren\Http\Stream\Stream;

$stream = new Stream('some-url', Stream::MODE_R);
$content = (string)$stream;
```

## Seeren\Http\Request\Request

A request with parsed input for json or form data

```php
use Seeren\Http\Request\Request;
use Seeren\Http\Stream\RequestStream;
use Seeren\Http\Uri\RequestUri;

$request = new Request(
    new RequestStream(),
    new RequestUri()
);
```

## Seeren\Http\Response\Response

A client or server response

```php
use Seeren\Http\Response\Response;
use Seeren\Http\Stream\ResponseStream;

$response = new Response(
    new ResponseStream()
);
```

## License

This project is licensed under the MIT License