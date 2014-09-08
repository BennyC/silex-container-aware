<?php

namespace Fudge\SilexComponents\DependencyInjection;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
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
     * @group controllerCreation
     */
    public function testEnsureInterfacesReturnCorrectly()
    {
        $app = new Application;
        $app['Fudge\SilexComponents\DependencyInjection\Foo'] = function () {
            return new Bar();
        };

        $controllerResolver = new ControllerResolver($app, $app['logger']);
        $controller = $controllerResolver->buildController(__NAMESPACE__.'\ControllerExample');

        $this->assertTrue($controller->getFoo() instanceof Bar);
    }
}

interface Foo {}
class Bar implements Foo {}

class ControllerExample
{
    public function __construct(Foo $bar)
    {
        $this->bar = $bar;
    }

    public function getFoo()
    {
        return $this->bar;
    }
}
