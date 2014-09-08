<?php

namespace Fudge\SilexComponents\DependencyInjection;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @package fudge\silex-container-aware
 * @version 0.2.0
 */
class DependencyInjectionServiceProvider implements ServiceProviderInterface
{
    /**
     * @see ServiceProviderInterface::register
     */
    public function register(Application $app)
    {
        $app['resolver'] = $app->share(function () use ($app) {
            return new ControllerResolver($app, $app['logger']);
        });
    }

    /**
     * @see ServiceProviderInterface::boot
     */
    public function boot(Application $app)
    {
    }
}
