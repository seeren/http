<?php

/**
 * This file contain Seeren\Http\Upload\UploadedFileInterface interface
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

namespace Seeren\Http\Upload;

use Psr\Http\Message\UploadedFileInterface;

/**
 * Interface for represente an uploaded file
 * 
 * @category Seeren
 * @package Http
 * @subpackage Upload
 */
interface UploadedFileInterface extends UploadedFileInterface
{

   const
       /**
        * @var string file index
        */
       NAME = "name",
       /**
        * @var string file index
        */
       TYPE = "type",
       /**
        * @var string file index
        */
       TMP = "tmp_name",
       /**
        * @var string file index
        */
       ERROR = "error",
       /**
        * @var string file index
        */
       SIZE = "size";

}
