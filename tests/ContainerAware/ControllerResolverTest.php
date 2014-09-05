<?php

namespace Fudge\SilexComponents\ContainerAware;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package fudge/silex-container-aware
 * @version 0.1.0
 * @group controllerResolver
 */
class ControllerResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group exists
     */
    public function testExistence()
    {
        $className = __NAMESPACE__."\\ControllerResolver";
        $this->assertTrue(class_exists($className));
    }

    /**
     * @covers Fudge\SilexComponents\ContainerAware\ControllerResolver::createController
     * @covers Fudge\SilexComponents\ContainerAware\Controller::setContainer
     * @covers Fudge\SilexComponents\ContainerAware\Controller::getContainer
     */
    public function testCreationOfContainerAwareController()
    {
        $app = new Application;
        $controllerResolver = new ControllerResolver($app);

        $request = Request::create("/");
        $request->attributes->set("_controller", __NAMESPACE__."\\Controller::getContainer");

        list($controller, $method) = $controllerResolver->getController($request);

        $this->assertInstanceOf(__NAMESPACE__."\\Controller", $controller);
        $this->assertEquals($app, $controller->getContainer());
    }
}
