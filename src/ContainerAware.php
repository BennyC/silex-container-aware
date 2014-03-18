<?php

namespace Fudge\SilexComponents\ContainerAware;

/**
 * @package fudge\silex-container-aware
 * @version 0.1.0
 */
interface ContainerAware
{
    /**
     * Setter for the Container
     *
     * @param \Silex\Application
     */
    public function setContainer(\Silex\Application $app);

    /**
     * Getter for the Container
     *
     * @return \Silex\Application
     */
    public function getContainer();
}
