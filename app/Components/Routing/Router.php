<?php
/**
 * @version 1.0.0
 */
namespace mvc\app\Components\Routing;

include dirname(__DIR__, 2) . '/../vendor/autoload.php';

use Aigletter\Contracts\Routing\RouteInterface;
use \ReflectionMethod;

/**
 * Этот класс приминимает отвечает за раутинг всего проекта.
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 */
class Router implements RouteInterface
{
    /** @var array  */
    protected $routes = array();
    /**
     * @param string $uri
     *
     * @return callable
     */
    public function route(string $uri): callable
    {
        return function () use ($uri)
        {
            if($uri === '/'){
                die('Main page');
            }
            if($this->routes){

                $action = false;
                if(strpos($uri, '?')){
                    $path = explode( '?', $uri)[0];
                }else{
                    $path = $uri;

                }
                foreach ($this->routes as $route){
                    if($route['path'] === $path){
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
                                        $reflectionMethod = new \ReflectionMethod($instance, $method);
                                        $parameters = $this->getParams($reflectionMethod);
                                        if($parameters){
                                            $reflectionMethod->invokeArgs($instance, $parameters);
                                        }else{
                                            throw new \Exception('Too few arguments!');
                                        }

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
    /**
     * @param ReflectionMethod $method
     *
     * @return array
     */
    public function getParams(ReflectionMethod $method): array
    {
        $params = array();
        if(count($method->getParameters()) > 0){
            foreach ($method->getParameters() as $item){
                $name = $item->getName();
                $position = $item->getPosition();
                if(isset($_GET[$name])){
                    $value = $_GET[$name];
                }else{
                    $value = null;
                }

                $params[$position] = $value;

            }
        }
            return $params;
    }
    /**
     * @param string $path
     * @param mixed $action
     */
    public function addRoute($path, $action)
    {
        $this->routes[] = array(
            'path' => $path,
            'action' => $action
        );
    }
}