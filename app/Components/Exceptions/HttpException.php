<?php

namespace mvc\app\Components\Exceptions;

use Exception;

class HttpException extends Exception
{
    protected $message;

    protected $code;

    public function getHttpException(): string
    {
        return '<h1>' . $this->code . '</h1>' . '<div>' . $this->message .'</div>';
    }
}