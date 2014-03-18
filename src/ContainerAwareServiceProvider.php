<?php

namespace Fudge\SilexComponents\ContainerAware;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @package fudge\silex-container-aware
 * @version 0.1.0
 */
class ContainerAwareServiceProvider implements ServiceProviderInterface
{
    /**
     * @see Silex\ServiceProviderInterface::register
     */
    public function register(Application $app)
    {
        $app['resolver'] = $app->share(function () use ($app) {
            return new ControllerResolver($app, $app['logger']);
        });
    }

    /**
     * @see Silex\ServiceProviderInterface::boot
     */
    public function boot(Application $app)
    {
    }
}
