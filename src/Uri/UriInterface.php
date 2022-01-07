<?php

namespace Seeren\Http\Uri;

interface UriInterface extends \Psr\Http\Message\UriInterface
{

    const SCHEME_HTTP = 'http';

    const SCHEME_HTTPS = 'https';

    const SCHEME_SEPARATOR = '://';

    const SEPARATOR = '/';

    const HOST_SEPARATOR = ':';

    const USER_SEPARATOR = '@';

    const PATH_SEPARATOR = '?';

    const QUERY_SEPARATOR = '#';

}
