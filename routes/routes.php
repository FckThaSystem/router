<?php
/**
 * @var \mvc\app\Components\Routing\Router $router
 */
$router->addRoute('/product/action', function (){
    echo 'This is product page' . PHP_EOL;
});
$router->addRoute('/category/get', [\mvc\app\Controllers\Category::class, 'get']);

$router->addRoute('/product/show', [\mvc\app\Controllers\ProductController::class, 'show']);