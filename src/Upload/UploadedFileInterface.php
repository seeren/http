<?php

namespace Seeren\Http\Upload;

/**
 * Interface to represent a uploaded file
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Http\Upload
 */
interface UploadedFileInterface extends \Psr\Http\Message\UploadedFileInterface
{

    /**
     * @var string
     */
    const NAME = 'name';

    /**
     * @var string
     */
    const TYPE = 'type';

    /**
     * @var string
     */
    const TMP = 'tmp_name';

    /**
     * @var string
     */
    const ERROR = 'error';

    /**
     * @var string
     */
    const SIZE = 'size';

}
