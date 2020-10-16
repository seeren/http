<?php

namespace Seeren\Http\Stream;

/**
 * Class to represent a response stream
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Stream
 */
class ResponseStream extends Stream
{

    public function __construct()
    {
        parent::__construct('php://output', self::MODE_W);
    }

}
