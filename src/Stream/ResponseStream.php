<?php

namespace Seeren\Http\Stream;

final class ResponseStream extends Stream
{

    public final function __construct()
    {
        parent::__construct('php://output', self::MODE_W);
    }

}
