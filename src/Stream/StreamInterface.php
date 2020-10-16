<?php

namespace Seeren\Http\Stream;

/**
 * Interface to represent a generic stream
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Stream
 */
interface StreamInterface extends \Psr\Http\Message\StreamInterface
{

    /**
     * @var string
     */
    const MODE_R = 'r';

    /**
     * @var string
     */
    const MODE_R_MORE = 'r+';

    /**
     * @var string
     */
    const MODE_W = 'w';

    /**
     * @var string
     */
    const MODE_W_MORE = 'w+';

    /**
     * @var string
     */
    const MODE_A = 'a';

    /**
     * @var string
     */
    const MODE_A_MORE = 'a+';

    /**
     * @var string
     */
    const MODE_X = 'x';

    /**
     * @var string
     */
    const MODE_X_MORE = 'x+';

    /**
     * @var string
     */
    const MODE_C = 'c';

    /**
     * @var string
     */
    const MODE_C_MORE = 'c+';

}
