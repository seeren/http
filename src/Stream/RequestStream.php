<?php

namespace Seeren\Http\Stream;

/**
 * Class to represent a request stream
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Stream
 */
class RequestStream extends Stream
{

    public function __construct()
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
