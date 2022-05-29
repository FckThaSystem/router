<?php

ini_set('display_errors', '1');

include __DIR__ ."/../vendor/autoload.php";

$component = new \mvc\app\Components\Routing\RouterFactory();

$router = $component->createComponent();

$action = $router->route($_SERVER['REQUEST_URI']);
//var_dump($action());
$action();