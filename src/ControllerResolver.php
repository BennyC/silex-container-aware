<?php

namespace Fudge\SilexComponents\ContainerAware;

/**
 * @package fudge/silex-container-aware
 * @version 0.1.0
 */
class ControllerResolver extends \Silex\ControllerResolver
{
    /**
     * @see Silex\ControllerResolver::createController
     */
    protected function createController($controller)
    {
        list($controller, $method) = parent::createController($controller);

        if ($controller instanceof ContainerAware) {
            $controller->setContainer($this->app);
        }

        return [$controller, $method];
    }
}
