<?php

/**
 * This file contain Seeren\Http\Stream\StreamInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.0.4
 */

namespace Seeren\Http\Stream;

/**
 * Interface for represent stream
 * 
 * @category Seeren
 * @package Http
 * @subpackage Stream
 */
interface StreamInterface
{

   const

       /**
        * @var string open mode
        */
       MODE_R      = "r",
       /**
        * @var string open mode
        */
       MODE_R_MORE = "r+",
       /**
        * @var string open mode
        */
       MODE_W      = "w",
       /**
        * @var string open mode
        */
       MODE_W_MORE = "w+",
       /**
        * @var string open mode
        */
       MODE_A      = "a",
       /**
        * @var string open mode
        */
       MODE_A_MORE = "a+",
       /**
        * @var string open mode
        */
       MODE_X      = "x",
       /**
        * @var string open mode
        */
       MODE_X_MORE = "x+",
       /**
        * @var string open mode
        */
       MODE_C      = "c",
       /**
        * @var string open mode
        */
       MODE_C_MORE = "c+";

}
