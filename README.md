## Seeren\Http\

Psr-7 implementation.
Manage Http message with standard Message, Request, ServerRequest, UploadedFile, Response, Uri and Stream.

#### Seeren\Http\Uri\Uri

Uri provide basic uri using constructor or with method.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/UriInterface.php
 */
 
use Seeren\Http\Uri\Uri;

$uri = new Uri("http", "host");

echo $uri->withUser("user", "pswd")
         ->withPort(80)
         ->withPath("path")
         ->withQuery("foo=bar");
```

#### Seeren\Http\Uri\ServerRequestUri

ServerRequestUri use server input for self construct then detect presence of
RewriteEngine for correct string representation. An instance is handled by a 
ServerRequest and may be used by a router.

```php
use Seeren\Http\Uri\ServerRequestUri
$uri = new ServerRequestUri;
```

#### Seeren\Http\Stream\Stream

For ressource manipulation Stream can be use. This implementation of StreamInterface
expect two arguments, ressource target and mode.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/StreamInterface.php
 */
 
use Seeren\Http\Stream\Stream;

(new Stream("file.txt", "a+"))->write("output");
```

#### Seeren\Http\Stream\ServerRequestStream

Request body is handled by ServerRequestStream using php://input.

```php
$body = (new ServerRequestStream)->__toString();
```

#### Seeren\Http\Stream\ServerResponseStream

Response body is send by ServerResponseStream using php://output.

```php
(new ServerResponseStream)->write("output");
```

#### Seeren\Http\Response\Response

Response is a strict Psr implementation and provide two extra methods for set and remove header. A StreamInterface have to be provided for creation.
```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/ResponseInterface.php
 */

use Seeren\Http\Response\Response;

$response = new Response(new Stream("php://temp/", "r+"));

$response->getBody()->write("output");
    
echo $response->getBody();
```
#### Seeren\Http\Response\ServerResponse

ServerResponse can be used for using a preconfigured response using non cachable body

```php
(new Response(new ServerResponseStream))->getBody()->write("output");
```
#### Seeren\Http\Upload\UploadFile

UploadFile atempt to received an element like a $_FILES element.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/UploadedFileInterface.php
 */

use Seeren\Http\Upload\UploadedFile;

(new UploadedFile(
    ["tmp_name" => "path/foo.txt"])
)->moveTo("path/bar.txt");
```
#### Seeren\Http\Request\Request

Request is a strict Psr implementation, a StreamInterface and UriInterface have to be provided for creation.

```php
/**
 * @see https://github.com/php-fig/http-message/blob/master/src/RequestInterface.php
 */

use Seeren\Http\Request\Request;
use Seeren\Http\Stream\Stream;
use Seeren\Http\Uri\Uri;

$request = new Request(
    new Stream("php://temp/", "w"),
    new Uri("http", "host")
);
```
#### Seeren\Http\Request\ServerRequest

ServerRequest handle all inputs, protocol, method, headers and body. Two extra methods for set and remove attributes are provided.

```php
(new ServerRequest(
    new ServerRequestStream,
    new ServerRequestUri)
)->getUploadedFiles()["foo"]->moveTo("foo.txt");
```

### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit seeren/src/http/test/Request/RequestTest.php
$ phpunit seeren/src/http/test/Request/ServerRequestTest.php
$ phpunit seeren/src/http/test/Response/ResponseTest.php
$ phpunit seeren/src/http/test/Uri/UriTest.php
$ phpunit seeren/src/http/test/Uri/ServerRequestUriTest.php
$ phpunit seeren/src/http/test/Stream/StreamTest.php
$ phpunit seeren/src/http/test/Stream/ServerRequestStreamTest.php
$ phpunit seeren/src/http/test/Stream/ServerResponseStreamTest.php
$ phpunit seeren/src/http/test/Upload/UploadedFileTest.php
```

### License

* [MIT](https://github.com/Seeren/Seeren/blob/master/LICENSE)
