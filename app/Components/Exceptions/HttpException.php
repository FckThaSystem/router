<?php

namespace mvc\app\Components\Exceptions;

class HttpException
{
    protected $message;

    protected $code;

    public function getHttpException(): string
    {
        return '<h1>' . $this->code . '</h1>' . '<div>' . $this->message .'</div>';
    }
}