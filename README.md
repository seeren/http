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

## Request Usage

#### `Seeren\Http\Request\ClientRequest`
Consume web service with client request, a method and an uri interface implementation are needed at construction
```php
$Psr7Response = (new ClientRequest("GET", new Uri("http", "host"))->getResponse();
```
Headers and body can be specified as in the example above for send a post request
```php
$Psr7Request = new ClientRequest(
    "POST",
    new Uri("http", "host"), [
        "Content-Type" => "application/x-www-form-urlencoded",
        "Accept" => "application/json",
]);
$Psr7Request->getBody()->write(http_build_query(["key" => "value"]));
$Psr7Response = $Psr7Request->getResponse();
```

#### `Seeren\Http\Request\ServerRequest`
ServerRequest handle all inputs, protocol, method, headers, body, uri and uploaded files of a request send by a client
```php
$Psr7ServerRequest = new ServerRequest(new ServerRequestStream, new ServerRequestUri));
```

## Response Usage

#### `Seeren\Http\Response\Response`
A generic response is provided and can't provoq a direct output. She need a stream interface implementation at construction
```php
$Psr7Response = new Response(new Stream("php://temp/", "r+"));
$Psr7Response->getBody()->write("output");
$Psr7Response->getBody()->rewind();
echo $Psr7Response->getBody();
```
#### `Seeren\Http\Response\ServerResponse`
ServerResponse use non cacheable body and can provoq redirect output using `php://output`
```php
(new ServerResponse(new ServerResponseStream))->getBody()->write($body);
```

## Uri Usage

#### `Seeren\Http\Uri\Uri`
Uri need at least a schema and a host
```php
$uri = new Uri("http", "host");
```
An uri is handle by request, you can use this one instead of create a new uri
```php
echo $PsrRequest->getUri()
->withUser("user", "pswd")
->withPort(80)
->withPath("target")
```

## Others Usage

Uploaded files usage is described on [1.3 Streams](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md#13-streams) and streams usage is described on [1.6 Uploaded files](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md#16-uploaded-files)

## Run Unit tests
Install dependencies
```
composer update
```
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enabled and [OPcache](http://php.net/manual/fr/book.opcache.php) disabled for coverage
```
./vendor/bin/phpunit
```
## Run Coverage
Install dependencies
```
composer update
```
Run [coveralls](https://coveralls.io/) for check coverage
```
./vendor/bin/coveralls -v
```

##  Contributors
* **Cyril Ichti** - *Initial work* - [seeren](https://github.com/seeren)

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.