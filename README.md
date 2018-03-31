# http
 [![Build Status](https://travis-ci.org/seeren/http.svg?branch=master)](https://travis-ci.org/seeren/http) [![Coverage Status](https://coveralls.io/repos/github/seeren/http/badge.svg?branch=master)](https://coveralls.io/github/seeren/http?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/http.svg)](https://packagist.org/packages/seeren/http/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/http?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/http&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/http.svg)](https://packagist.org/packages/seeren/http#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Manage http message**
> This package contain implementations of the [PSR-7 HTTP message interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md)

## Features
* Manage client/server request and response

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/http dev-master
```

## Usage

#### `Seeren\Http\Request\ClientRequest`
Send http request
```php
$request = new ClientRequest("POST", new Uri("http", "host"), $header, $body);
```

Retrieve http response
```php
$response = $request->getResponse();
```

#### `Seeren\Http\Request\ServerRequest`
Receive http request
```php
$request = new ServerRequest(new ServerRequestStream, new ServerRequestUri));
```

#### `Seeren\Http\Response\ServerResponse`
Send http response
```php
(new ServerResponse(new ServerResponseStream))->getBody()->write($output);
```

#### `Seeren\Http\Uri\Uri`
Build Uri from others
```php
$uri = $request->getUri()->withUser("user", "pswd")
```

## Run Tests

Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enable and [OPcache](http://php.net/manual/fr/book.opcache.php) disable
```
./vendor/bin/phpunit
```
## Run Coverage

Run [coveralls](https://coveralls.io/)
```
./vendor/bin/php-coveralls -v
```

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.