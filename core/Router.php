<?php

namespace mvc\core;

include __DIR__ . '/../vendor/autoload.php';

use Aigletter\Contracts\Routing\RouteInterface;

class Router implements RouteInterface
{
    protected $routes = array();

    public function route(string $uri): callable
    {
        return function () use ($uri)
        {
            if($uri === '/'){
                die('Main page');
            }
            if($this->routes){

                $action = false;

                foreach ($this->routes as $route){
//                    var_dump([$key, $uri]);
                    if($route['path'] === $uri){
                        $action = $route['action'];
                    }
                }
                if($action){
                    if(is_object($action)){
                        return $action();
                    }else{
                        if($action[0]){
                            $class = $action[0];
                            if(class_exists($class)){
                                $instance = new $class();
                                if($action[1]){
                                    if(method_exists($instance, $action[1])){
                                        $method = $action[1];
                                        echo $instance->$method() . PHP_EOL;
                                    }
                                }
                            }
                        }
                    }

                }else{
                    throw new \Exception('404. There route like ' . $uri . ' does not exist!');
                }
            }else{
               throw new \Exception('404. There route like ' . $uri . ' does not exist!');
            }
        };
    }

    public function addRoute($path, $action)
    {
        $this->routes[] = array(
            'path' => $path,
            'action' => $action
        );
    }
}