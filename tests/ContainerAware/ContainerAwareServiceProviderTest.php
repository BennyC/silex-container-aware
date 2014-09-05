<?php

namespace Fudge\SilexComponents\ContainerAware;

use Silex\Application;

/**
 * @package fudge/silex-container-aware
 * @version 0.1.0
 * @group containerAwareServiceProvider
 */
class ContainerAwareServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group exists
     */
    public function testExistence()
    {
        $className = __NAMESPACE__."\\ContainerAwareServiceProvider";
        $this->assertTrue(class_exists($className));
        $this->assertContains("Silex\\ServiceProviderInterface", class_implements($className));
    }

    /**
     * @covers Fudge\SilexComponents\ContainerAware\ContainerAwareServiceProvider::register
     * @covers Fudge\SilexComponents\ContainerAware\ContainerAwareServiceProvider::boot
     */
    public function testSettingOfContainerAwareControllerResolver()
    {
        $app = new Application;
        $app->register(new ContainerAwareServiceProvider);
        $this->assertInstanceOf(__NAMESPACE__."\\ControllerResolver", $app['resolver']);
    }
}
