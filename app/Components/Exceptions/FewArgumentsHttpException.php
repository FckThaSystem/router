<?php

namespace mvc\app\Components\Exceptions;

class FewArgumentsHttpException extends HttpException
{
    protected $message = 'Too few arguments';

    protected $code = 400;
}