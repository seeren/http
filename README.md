## Seeren\Http\

Psr-7 implementation.

#### Code Example

Manage Http Message, Request, UploadedFile, Response, Uri and Stream.

### Seeren\Http\Uri\Uri

Uri provide basic uri using constructor or the with method.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/UriInterface.php
 */
 
$uri = new Uri("http", "host");

echo $uri->withUser("user", "pswd")
         ->withPort(80)
         ->withPath("path")
         ->withQuery("foo=bar");
```

### Seeren\Http\Uri\ServerRequestUri

ServerRequestUri use server input for self construct then detect presence of
RewriteEngine for correct string representation. An instance is handled by a 
ServerRequest and should be used by a router.

```php
$uri = new ServerRequestUri;
```

### Seeren\Http\Stream\Stream

For ressource manipulation Stream can be used. This implementation of StreamInterface
expect ressource target and mode.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/StreamInterface.php
 */
 
(new Stream("file.txt", "a+"))->write("output");
```

Optionnaly a context can be specified


```php
$stream = new Stream(
    "http://dev.seeren.fr/test.php",
    "r",
    stream_context_create([
        "http" => [
            "method" => "POST",
            "header"=> "Content-type: application/x-www-form-urlencoded\r\n",
            "content" => http_build_query(["foo" => "bar"])
        ]
]));
```

### Seeren\Http\Stream\ServerRequestStream

Request body is handled by ServerRequestStream using php://input.

```php
$body = (new ServerRequestStream)->__toString();
```

### Seeren\Http\Stream\ServerResponseStream

Response body is send by ServerResponseStream using php://output.

```php
(new ServerResponseStream)->write("output");
```

### Seeren\Http\Response\Response

Response is a strict Psr implementation. A StreamInterface have to be provided for creation.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/ResponseInterface.php
 */

$response = new Response(new Stream("php://temp/", "r+"));
$response->getBody()->write("output");
$response->getBody()->rewind();

echo $response->getBody();
```

### Seeren\Http\Response\ServerResponse

ServerResponse can be used for using a preconfigured response using non cachable body

```php
(new Response(new ServerResponseStream))->getBody()->write("output");
```

#### Seeren\Http\Upload\UploadFile

UploadFile atempt to received a $_FILES like element.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/UploadedFileInterface.php
 */

(new UploadedFile(
    ["tmp_name" => "path/foo.txt"])
)->moveTo("path/bar.txt");
```

### Seeren\Http\Request\Request

Request is a strict Psr implementation, a StreamInterface and UriInterface have to be provided for creation.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/RequestInterface.php
 */

$request = new Request(
    new Stream("php://temp/", "w"),
    new Uri("http", "host")
);
```

### Seeren\Http\Request\ServerRequest

ServerRequest handle all inputs, protocol, method, headers and body.

```php
(new ServerRequest(
    new ServerRequestStream,
    new ServerRequestUri)
)->getUploadedFiles()["foo"]->moveTo("foo.txt");
```

### Seeren\Http\Request\ClientRequest

Consum web service with client request, a Response is provided after request is send.

```php
$response = (new ClientRequest(
    "GET",
    new Uri("http", "host"),
    new ClientRequestStream))->send()->getResponse();
```

#### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit test/Request/RequestTest.php
$ phpunit test/Request/ServerRequestTest.php
$ phpunit test/Response/ResponseTest.php
$ phpunit test/Uri/UriTest.php
$ phpunit test/Uri/ServerRequestUriTest.php
$ phpunit test/Stream/StreamTest.php
$ phpunit test/Stream/ServerRequestStreamTest.php
$ phpunit test/Stream/ServerResponseStreamTest.php
$ phpunit /test/Upload/UploadedFileTest.php
```

#### License

[MIT](https://github.com/Seeren/Seeren/blob/master/LICENSE)
