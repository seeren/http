[![Build Status](https://travis-ci.org/seeren/http.svg?branch=master)](https://travis-ci.org/seeren/http) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/http/master/LICENSE) [![Packagist](https://img.shields.io/packagist/v/seeren/http.svg)](https://packagist.org/packages/seeren/http) [![Packagist](https://img.shields.io/packagist/dt/seeren/http.svg)](https://packagist.org/packages/seeren/http/stats)

# Seeren\Http\
Psr-7 implementation.
Manage http message, request, uploaded files, response, uri and stream.

## Seeren\Http\Uri\Uri
Uri need at least a protocol and a host.
```php
$uri = new Uri("http", "host");
echo $uri->withUser("user", "pswd")
         ->withPort(80)
         ->withPath("path")
         ->withQuery("foo=bar");
```

## Seeren\Http\Uri\ServerRequestUri
ServerRequestUri use server input for self construction then detect presence of RewriteEngine for correct string representation. An instance is handled by a ServerRequest.
```php
$uri = new ServerRequestUri;
```

## Seeren\Http\Stream\Stream
For ressource manipulation Stream can be used. This implementation of StreamInterface expect ressource target and mode.
```php
(new Stream("foo.txt", "a+"))->write("output");
```
Optionnaly a context can be specified
```php
$stream = new Stream(
    "http://example/foo",
    "r",
    stream_context_create([
        "http" => [
            "method" => "POST",
            "header"=> "Content-type: application/x-www-form-urlencoded\r\n",
            "content" => http_build_query(["foo" => "bar"])
        ]
]));
```

## Seeren\Http\Stream\ServerRequestStream
Request body is handled by ServerRequestStream using php://input.
```php
$body = (new ServerRequestStream)->__toString();
```

## Seeren\Http\Stream\ServerResponseStream
Response body is send by ServerResponseStream using php://output.
```php
(new ServerResponseStream)->write($body);
```

## Seeren\Http\Response\Response
Response is a strict Psr implementation. A StreamInterface have to be provided at creation.
```php
$response = new Response(new Stream("php://temp/", "r+"));
$response->getBody()->write("output");
$response->getBody()->rewind();
echo $response->getBody();
```

## Seeren\Http\Response\ServerResponse
ServerResponse can be used for using a preconfigured response using non cachable body
```php
(new Response(new ServerResponseStream))->getBody()->write($body);
```

## Seeren\Http\Upload\UploadFile
UploadFile atempt to received a $_FILES like element.
```php
(new UploadedFile(
    ["tmp_name" => "foo.txt"])
)->moveTo("bar.txt");
```

## Seeren\Http\Request\Request
Request is a strict Psr implementation, a StreamInterface and UriInterface have to be provided for creation.
```php
$request = new Request(
    new Stream("php://temp/", "w"),
    new Uri("http", "host")
);
```

## Seeren\Http\Request\ServerRequest
ServerRequest handle all inputs, protocol, method, headers and body.
```php
(new ServerRequest(
    new ServerRequestStream,
    new ServerRequestUri)
)->getUploadedFiles()["foo"]->moveTo("foo.txt");
```

## Seeren\Http\Request\ClientRequest
Consum web service with client request, a Response is provided after request is send.
```php
$response = (new ClientRequest(
    "GET",
    new Uri("http", "host"),
    new ClientRequestStream))->send()->getResponse();
```

## Installation
Require this package with composer
```
composer require seeren/http dev-master
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **Cyril Ichti** - [www.seeren.fr](http://www.seeren.fr)