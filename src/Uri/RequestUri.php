<?php

namespace Seeren\Http\Uri;

class RequestUri extends AbstractUri
{

    public function __construct()
    {
        parent::__construct(
            filter_input(INPUT_SERVER, 'REQUEST_SCHEME') ?? 'https',
            (string)filter_input(INPUT_SERVER, 'REMOTE_USER'),
            (string)filter_input(INPUT_SERVER, 'SERVER_NAME'),
            filter_input(INPUT_SERVER, 'SERVER_PORT'),
            ($path = filter_input(INPUT_SERVER, 'PATH_INFO'))
                ? $path
                : (($path = filter_input(INPUT_SERVER, 'REDIRECT_URL'))
                ? $path
                : str_replace(
                    '?' . (string)filter_input(INPUT_SERVER, 'QUERY_STRING'),
                    '',
                    (string)filter_input(INPUT_SERVER, 'REQUEST_URI')
                )),
            (string)filter_input(INPUT_SERVER, 'QUERY_STRING'),
            ''
        );
    }

}
