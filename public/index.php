<?php
//ini_set('display_errors', 1);
include __DIR__ ."/../vendor/autoload.php";

$component = new \mvc\app\Components\Routing\RouterFactory();

$router = $component->createComponent();
$action = $router->route($_SERVER['REQUEST_URI']);

try{
    $action();
}catch (Throwable $throwable){
    if(strpos($throwable->getMessage(), '404')){
        $http_exception = new \mvc\app\Components\Exceptions\NotFoundHttpException();
        echo $http_exception->getHttpException();
    }elseif (strpos($throwable->getMessage(), 'Argument')){
        $http_exception = new \mvc\app\Components\Exceptions\FewArgumentsHttpException();
        echo $http_exception->getHttpException();
    }else{
        $http_exception = new \mvc\app\Components\Exceptions\ServerErrorHttpException();
        echo $http_exception->getHttpException();
    }
}
