<?php

namespace Seeren\Http\Request;

interface ServerRequestInterface extends RequestInterface, \Psr\Http\Message\ServerRequestInterface
{

    const SERVER_PROTOCOL = 'SERVER_PROTOCOL';

    const SERVER_METHOD = 'REQUEST_METHOD';

}
