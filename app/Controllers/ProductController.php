<?php

namespace mvc\app\Controllers;

class ProductController
{
//    protected $params = array();
//
//    public function __construct(array $params)
//    {
//        var_dump($params);
//        $this->id = $params['id'];
//        $this->name = $params['name'] ?? '';
//    }

    public function show($id, $name = '')
    {
        echo '<h1>Product id =' . $id . '</h1>' . PHP_EOL;
        echo '<h1>Product name =' . $name . '</h1>' . PHP_EOL;

    }

}