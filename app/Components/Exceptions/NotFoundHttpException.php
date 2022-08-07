<?php

namespace mvc\app\Components\Exceptions;

class NotFoundHttpException extends HttpException
{
    protected $message = 'Page not found';

    protected $code = 404;
}