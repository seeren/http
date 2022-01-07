<?php

namespace Seeren\Http\Stream;

final class RequestStream extends Stream
{

    public final function __construct()
    {
        parent::__construct('php://input', self::MODE_R);
        $body = $this->__toString();
        $this->stream = @fopen('php://temp', self::MODE_R_MORE);
        $this->meta['writable'] = true;
        $this->write($body);
        $this->rewind();
        $this->meta['writable'] = false;
    }

}
