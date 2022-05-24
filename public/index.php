<?php

ini_set('display_errors', '1');

include __DIR__ ."/../vendor/autoload.php";

$router = new \mvc\core\Router();

$router->addRoute('/search/product', function (){
    echo 'This is product page' . PHP_EOL;
});
$router->addRoute('/catalog/category', [\mvc\core\Category::class, 'getCategory']);

$action = $router->route($_SERVER['REQUEST_URI']);

$action();