<?php
/**
 * @version 1.0.0
 */
namespace mvc\app\Components\Routing;

use Aigletter\Contracts\ComponentFactory;
/**
 * Класс-фабрика для создания роутеров
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 */
class RouterFactory extends ComponentFactory
{
    /**
     * @return Router
     */
    protected function createConcreteComponent()
    {
        $router = new Router();

        include __DIR__ . '/../../../routes/routes.php';

        return $router;
    }
}