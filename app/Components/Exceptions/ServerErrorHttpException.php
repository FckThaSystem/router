<?php

namespace mvc\app\Components\Exceptions;

class ServerErrorHttpException extends HttpException
{
    protected $message = 'Server error';

    protected $code = 500;
}