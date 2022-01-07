<?php

namespace Seeren\Http\Uri;

use InvalidArgumentException;


class Uri extends AbstractUri
{

    public function __construct(
        string $scheme,
        string $host,
        string $path = '',
        string $query = '',
        string $user = '',
        int $port = null,
        string $fragment = '')
    {
        parent::__construct(
            $scheme,
            $user,
            $host,
            $port,
            $path,
            $query,
            $fragment);
    }

}
