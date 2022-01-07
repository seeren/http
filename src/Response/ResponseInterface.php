<?php

namespace Seeren\Http\Response;

interface ResponseInterface extends \Psr\Http\Message\ResponseInterface
{

    const HEADER_ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';

    const HEADER_ACCESS_CONTROL_ALLOW_CREDENTIALS = 'Access-Control-Allow-Credentials';

    const HEADER_ACCESS_CONTROL_ALLOW_HEADERS = 'Access-Control-Allow-Headers';

    const HEADER_ACCESS_CONTROL_ALLOW_METHODS = 'Access-Control-Allow-Methods';

    const HEADER_ACCEPT_RANGES = 'Accept-Ranges';

    const HEADER_AGE = 'Age';

    const HEADER_ALLOW = 'Allow';

    const HEADER_CONNECTION = 'Connection';

    const HEADER_CONTENT_DISPOSITION = 'Content-Disposition';

    const HEADER_CONTENT_ENCODING = 'Content-Encoding';

    const HEADER_CONTENT_LANGUAGE = 'Content-Language';

    const HEADER_ETAG = 'ETag';

    const HEADER_EXPIRES = 'Expires';

    const HEADER_LAST_MODIFIED = 'Last-Modified';

    const HEADER_LOCATION = 'Location';

    const HEADER_PRAGMA = 'Pragma';

    const HEADER_REFRESH = 'Refresh';

    const HEADER_RETRY_AFTER = 'Retry-After';

    const HEADER_TRANSFERT_ENCODING = 'Transfer-Encoding';

    const HEADER_WWW_AUTHENTICATE = 'WWW-Authenticate';

    const STATUS_100 = 'Continue';

    const STATUS_101 = 'Switching Protocols';

    const STATUS_200 = 'OK';

    const STATUS_201 = 'Created';

    const STATUS_202 = 'Accepted';

    const STATUS_203 = 'Non-Authoritative Information';

    const STATUS_204 = 'No Content';

    const STATUS_205 = 'Reset Content';

    const STATUS_206 = 'Partial Content';

    const STATUS_300 = 'Multiple Choices';

    const STATUS_301 = 'Moved Permanently';

    const STATUS_302 = 'Moved Temporarily';

    const STATUS_303 = 'See Other';

    const STATUS_304 = 'Not Modified';

    const STATUS_400 = 'Bad Request';

    const STATUS_401 = 'Unauthorized';

    const STATUS_402 = ' Payment Required';

    const STATUS_403 = 'Forbidden';

    const STATUS_404 = 'Not Found';

    const STATUS_405 = 'Method Not Allowed';

    const STATUS_406 = 'Not Acceptable';

    const STATUS_407 = 'Proxy Authentication Required';

    const STATUS_408 = 'Request Timeout';

    const STATUS_409 = 'Conflict';

    const STATUS_410 = 'Gone';

    const STATUS_411 = 'Length Required';

    const STATUS_412 = 'Precondition Failed';

    const STATUS_413 = 'Payload Too Large';

    const STATUS_414 = 'Request-URI Too Long';

    const STATUS_415 = 'Unsupported Media Type';

    const STATUS_416 = 'Requested Range Not Satisfiable';

    const STATUS_417 = 'Expectation Failed';

    const STATUS_500 = 'Internal Server Error';

    const STATUS_501 = 'Not Implemented';

    const STATUS_502 = 'Bad Gateway';

    const STATUS_503 = 'Service Unavailable';

    const STATUS_504 = 'Gateway Timeout';

    const STATUS_505 = 'HTTP Version Not Supported';

    const STATUS_506 = 'Variant Also Negotiates';

    const STATUS_507 = 'Insufficient Storage';

    const STATUS_508 = 'Loop Detected';

    const STATUS_509 = 'Bandwidth Limit Exceeded';

    const STATUS_510 = 'Not Extended';

    const STATUS_520 = 'Web server is returning an unknown error';

}
