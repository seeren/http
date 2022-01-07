<?php

namespace Seeren\Http\Stream;


interface StreamInterface extends \Psr\Http\Message\StreamInterface
{

    const MODE_R = 'r';

    const MODE_R_MORE = 'r+';

    const MODE_W = 'w';

    const MODE_W_MORE = 'w+';

    const MODE_A = 'a';

    const MODE_A_MORE = 'a+';

    const MODE_X = 'x';

    const MODE_X_MORE = 'x+';

    const MODE_C = 'c';

    const MODE_C_MORE = 'c+';

}
