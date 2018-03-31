<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/http
 * @version 1.1.2
 */

namespace Seeren\Http\Upload;

/**
 * Interface for represente an uploaded file
 * 
 * @category Seeren
 * @package Http
 * @subpackage Upload
 */
interface UploadedFileInterface
{

   const

       /**
        * @var string
        */
       NAME  = "name",

       /**
        * @var string
        */
       TYPE  = "type",

       /**
        * @var string
        */
       TMP   = "tmp_name",

       /**
        * @var string
        */
       ERROR = "error",

       /**
        * @var string
        */
       SIZE  = "size";

}
