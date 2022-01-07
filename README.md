# Seeren\\Http

[![Build](https://app.travis-ci.com/seeren/http.svg?branch=master)](https://app.travis-ci.com/seeren/http)
[![Require](https://poser.pugx.org/seeren/http/require/php)](https://packagist.org/packages/seeren/http)
[![Coverage](https://coveralls.io/repos/github/seeren/error/badge.svg?branch=master)](https://coveralls.io/github/seeren/http?branch=master)
[![Download](https://img.shields.io/packagist/dt/seeren/http.svg)](https://packagist.org/packages/seeren/http/stats)
[![Codacy](https://app.codacy.com/project/badge/Grade/baea2fa9ba704a80a6b693921af25cbd)](https://www.codacy.com/gh/seeren/http/dashboard?utm_source=github.com&utm_medium=referral&utm_content=seeren/http&utm_campaign=Badge_Grade)
[![Version](https://img.shields.io/packagist/v/seeren/http.svg)](https://packagist.org/packages/seeren/http)

Manage http messages

* * *

## Installation

Seeren\\Http is a [PSR-7 http messages interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md)
and a  [PSR-18 http client interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-18-http-client-meta.md)
implementation

```bash
composer require seeren/http
```

* * *

## Seeren\\Http\\Client

Retrieve response from sending request

```php
use Seeren\Http\Client\Client;
use Seeren\Http\Uri\Uri;

$client = new Client('GET', new Uri(
    'https',
    'packagist.org',
    'packages/seeren/http.json'
));
echo $client->sendRequest()->getBody();
```

* * *

## Seeren\\Http\\Uri

Uri representation

```php
use Seeren\Http\Uri\Uri;

$uri = new Uri('http', 'host');
```

Handle incoming request Uri

```php
use Seeren\Http\Uri\RequestUri;

$uri = new RequestUri();
```

* * *

## Seeren\\Http\\Stream

Handle resource with open mode

```php
use Seeren\Http\Stream\Stream;

echo new Stream('some-url', Stream::MODE_R);
```

Handle input for all http methods

```php
use Seeren\Http\Stream\RequestStream;

echo new RequestStream();
```

Handle output

```php
use Seeren\Http\Stream\ResponseStream;

$stream = new ResponseStream();
$stream->write('Client output');
```

* * *

## Seeren\\Http\\Request\\Request

Server Request representation with json or form input body

```php
use Seeren\Http\Request\Request;
use Seeren\Http\Stream\RequestStream;
use Seeren\Http\Uri\RequestUri;

$request = new Request(
    new RequestStream(),
    new RequestUri()
);
```

* * *

## Seeren\\Http\\Response\\Response

Server response

```php
use Seeren\Http\Response\Response;
use Seeren\Http\Stream\ResponseStream;

$response = new Response(
    new ResponseStream()
);
```

* * *

## License

This project is licensed under the [MIT](./LICENSE) License
