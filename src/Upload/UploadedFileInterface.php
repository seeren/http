<?php

namespace Seeren\Http\Upload;

interface UploadedFileInterface extends \Psr\Http\Message\UploadedFileInterface
{

    const NAME = 'name';

    const TYPE = 'type';

    const TMP = 'tmp_name';

    const ERROR = 'error';

    const SIZE = 'size';

}
