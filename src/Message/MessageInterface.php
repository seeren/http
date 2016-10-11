<?php

/**
 * This file contain Seeren\Http\Message\MessageInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Http\Message;

/**
 * Interface for represent http message
 * 
 * @category Seeren
 * @package Http
 * @subpackage Message
 */
interface MessageInterface
{

   const
       /**
        * @var string protocol
        */
       PROTOCOL = "HTTP/",
       /**
        * @var string protocol version 0
        */
       VERSION_0 = "1.0",
       /**
        * @var string protocol version 1
        */
       VERSION_1 = "1.1";

}
