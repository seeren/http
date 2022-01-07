<?php

namespace Seeren\Http\Request;

interface RequestInterface extends \Psr\Http\Message\RequestInterface
{

    const GET = 'GET';

    const HEAD = 'HEAD';

    const POST = 'POST';

    const PUT = 'PUT';

    const DELETE = 'DELETE';

    const CONNECT = 'CONNECT';

    const OPTIONS = 'OPTIONS';

    const TRACE = 'TRACE';

    const PATCH = 'PATCH';

    const HEADER_ACCEPT = 'Accept';

    const HEADER_EXPECT = 'Expect';

    const HEADER_FROM = 'From';

    const HEADER_HOST = 'Host';

    const HEADER_IF_MATCH = 'If-Match';

    const HEADER_IF_MODIFIED_SINCE = 'If-Modified-Since';

    const HEADER_IF_NOT_MATCH = 'If-None-Match';

    const HEADER_IF_RANGE = 'If-Range';

    const HEADER_IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';

    const HEADER_MAX_FORWARDS = 'Max-Forwards';

    const HEADER_ORIGIN = 'Origin';

    const HEADER_PROXY_AUTHORIZATION = 'Proxy-Authorization';

    const HEADER_RANGE = 'Range';

    const HEADER_REFERER = 'Referer';

    const HEADER_USER_AGENT = 'User-Agent';

}
