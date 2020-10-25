<?php

namespace Seeren\Http\Response;

/**
 * Interface to represent a response
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 *
 * @package Seeren\Http\Response
 */
interface ResponseInterface extends \Psr\Http\Message\ResponseInterface
{

    /**
     * @var string
     */
    const HEADER_ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';

    /**
     * @var string
     */
    const HEADER_ACCESS_CONTROL_ALLOW_CREDENTIALS = 'Access-Control-Allow-Credentials';

    /**
     * @var string
     */
    const HEADER_ACCESS_CONTROL_ALLOW_HEADERS = 'Access-Control-Allow-Headers';

    /**
     * @var string
     */
    const HEADER_ACCESS_CONTROL_ALLOW_METHODS = 'Access-Control-Allow-Methods';

    /**
     * @var string
     */
    const HEADER_ACCEPT_RANGES = 'Accept-Ranges';

    /**
     * @var string
     */
    const HEADER_AGE = 'Age';

    /**
     * @var string
     */
    const HEADER_ALLOW = 'Allow';

    /**
     * @var string
     */
    const HEADER_CONNECTION = 'Connection';

    /**
     * @var string
     */
    const HEADER_CONTENT_DISPOSITION = 'Content-Disposition';

    /**
     * @var string
     */
    const HEADER_CONTENT_ENCODING = 'Content-Encoding';

    /**
     * @var string
     */
    const HEADER_CONTENT_LANGUAGE = 'Content-Language';

    /**
     * @var string
     */
    const HEADER_ETAG = 'ETag';

    /**
     * @var string
     */
    const HEADER_EXPIRES = 'Expires';

    /**
     * @var string
     */
    const HEADER_LAST_MODIFIED = 'Last-Modified';

    /**
     * @var string
     */
    const HEADER_LOCATION = 'Location';

    /**
     * @var string
     */
    const HEADER_PRAGMA = 'Pragma';

    /**
     * @var string
     */
    const HEADER_REFRESH = 'Refresh';

    /**
     * @var string
     */
    const HEADER_RETRY_AFTER = 'Retry-After';

    /**
     * @var string
     */
    const HEADER_TRANSFERT_ENCODING = 'Transfer-Encoding';

    /**
     * @var string
     */
    const HEADER_WWW_AUTHENTICATE = 'WWW-Authenticate';

    /**
     * @var string
     */
    const STATUS_100 = 'Continue';

    /**
     * @var string
     */
    const STATUS_101 = 'Switching Protocols';

    /**
     * @var string
     */
    const STATUS_200 = 'OK';

    /**
     * @var string
     */
    const STATUS_201 = 'Created';

    /**
     * @var string
     */
    const STATUS_202 = 'Accepted';

    /**
     * @var string
     */
    const STATUS_203 = 'Non-Authoritative Information';

    /**
     * @var string
     */
    const STATUS_204 = 'No Content';

    /**
     * @var string
     */
    const STATUS_205 = 'Reset Content';

    /**
     * @var string
     */
    const STATUS_206 = 'Partial Content';

    /**
     * @var string
     */
    const STATUS_300 = 'Multiple Choices';

    /**
     * @var string
     */
    const STATUS_301 = 'Moved Permanently';

    /**
     * @var string
     */
    const STATUS_302 = 'Moved Temporarily';

    /**
     * @var string
     */
    const STATUS_303 = 'See Other';

    /**
     * @var string
     */
    const STATUS_304 = 'Not Modified';

    /**
     * @var string
     */
    const STATUS_400 = 'Bad Request';

    /**
     * @var string
     */
    const STATUS_401 = 'Unauthorized';

    /**
     * @var string
     */
    const STATUS_402 = ' Payment Required';

    /**
     * @var string
     */
    const STATUS_403 = 'Forbidden';

    /**
     * @var string
     */
    const STATUS_404 = 'Not Found';

    /**
     * @var string
     */
    const STATUS_405 = 'Method Not Allowed';

    /**
     * @var string
     */
    const STATUS_406 = 'Not Acceptable';

    /**
     * @var string
     */
    const STATUS_407 = 'Proxy Authentication Required';

    /**
     * @var string
     */
    const STATUS_408 = 'Request Timeout';

    /**
     * @var string
     */
    const STATUS_409 = 'Conflict';

    /**
     * @var string
     */
    const STATUS_410 = 'Gone';

    /**
     * @var string
     */
    const STATUS_411 = 'Length Required';

    /**
     * @var string
     */
    const STATUS_412 = 'Precondition Failed';

    /**
     * @var string
     */
    const STATUS_413 = 'Payload Too Large';

    /**
     * @var string
     */
    const STATUS_414 = 'Request-URI Too Long';

    /**
     * @var string
     */
    const STATUS_415 = 'Unsupported Media Type';

    /**
     * @var string
     */
    const STATUS_416 = 'Requested Range Not Satisfiable';

    /**
     * @var string
     */
    const STATUS_417 = 'Expectation Failed';

    /**
     * @var string
     */
    const STATUS_500 = 'Internal Server Error';

    /**
     * @var string
     */
    const STATUS_501 = 'Not Implemented';

    /**
     * @var string
     */
    const STATUS_502 = 'Bad Gateway';

    /**
     * @var string
     */
    const STATUS_503 = 'Service Unavailable';

    /**
     * @var string
     */
    const STATUS_504 = 'Gateway Timeout';

    /**
     * @var string
     */
    const STATUS_505 = 'HTTP Version Not Supported';

    /**
     * @var string
     */
    const STATUS_506 = 'Variant Also Negotiates';

    /**
     * @var string
     */
    const STATUS_507 = 'Insufficient Storage';

    /**
     * @var string
     */
    const STATUS_508 = 'Loop Detected';

    /**
     * @var string
     */
    const STATUS_509 = 'Bandwidth Limit Exceeded';

    /**
     * @var string
     */
    const STATUS_510 = 'Not Extended';

    /**
     * @var string
     */
    const STATUS_520 = 'Web server is returning an unknown error';

}
