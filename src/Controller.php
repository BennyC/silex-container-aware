<?php

namespace Fudge\SilexComponents\ContainerAware;

/**
 * @package fudge\silex-container-aware
 * @version 0.1.0
 */
class Controller implements ContainerAware
{
    protected $app;

    /**
     * @see Fudge\SilexComponents\ContainerAware\ContainerAware::setContainer
     */
    public function setContainer(\Silex\Application $app)
    {
        $this->app = $app;
    }

    /**
     * @see Fudge\SilexComponents\ContainerAware\ContainerAware::getContainer
     */
    public function getContainer()
    {
        return $this->app;
    }
}
