<?php

namespace Fudge\SilexComponents\DependencyInjection;

/**
 * @package fudge/silex-container-aware
 * @version 0.2.0
 */
class ControllerResolver extends \Silex\ControllerResolver
{
    /**
     * @see Silex\ControllerResolver::createController
     */
    protected function createController($controller)
    {
        list($class, $method) = explode('::', $controller, 2);

        return [$this->buildController($class), $method];
    }

    /**
     * Will go through the controller to find all of the dependencies, will
     * then find them within the container.
     * @param string
     * @return mixed
     */
    public function buildController($controllerName)
    {
        $reflection = new \ReflectionClass($controllerName);
        $construct  = $reflection->getConstructor();
        $parameters = $construct->getParameters();
        $list = [];

        foreach ($parameters as $p) {
            array_push($list, $this->app[$p->getClass()->name]);
        }

        return $reflection->newInstanceArgs($list);
    }
}
