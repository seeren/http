<?php

namespace Seeren\Http\Message;

interface MessageInterface extends \Psr\Http\Message\MessageInterface
{

    const PROTOCOL = 'HTTP/';

    const VERSION_0 = '1.0';

    const VERSION_1 = '1.1';

    const VERSION_2 = '2';

    const HEADER_CACHE_CONTROL = 'Cache-Control';

    const HEADER_COOKIE = 'Cookie';

    const HEADER_CONTENT_LENGTH = 'Content-Length';

    const HEADER_CONTENT_SECURITY_POLICY = 'Content-Security-Policy';

    const HEADER_CONTENT_TYPE = 'Content-Type';

    const HEADER_DATE = 'Date';

}
