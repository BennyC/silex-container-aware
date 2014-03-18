Silex Container Aware Service Provider
======================================

Provides Symfony2 Container Aware controllers within Silex.

This may seem redudant as you are given the Application instance per method call,
but this allows you to keep your code DRY as reusable methods can be implemented
involving external services, such as redirects and rendering.

Rest assured that this package is covered __100%__ by Unit Tests,
and does follow Semantic Versioning (unlike others!).

Examples below.

Requirements
------------
  * PHP 5.4+
  * Silex ~1 (Obviously!)

Examples
--------

__This is a very naive example, showing the accessibility of the Container within a ContainerAware Controller__

### Silex - index.php

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Fudge\SilexComponents\ContainerAware\ContainerAwareServiceProvider;

$app = new Application;
$app->register(new ContainerAwareServiceProvider);
$app->register(new ServiceControllerServiceProvider);
$app->get("/", "IndexController::hello");
```

### IndexController.php
```php
<?php

class IndexController extends \Fudge\SilexComponents\ContainerAware\Controller
{
    public function hello()
    {
        return $this->render("foo.html.twig");
    }

    protected function render($templateName)
    {
        return $this->get("twig")->render($templateName);
    }

    protected function get($service)
    {
        return $this->getContainer()[$service];
    }
}
```

Roadmap
-------
  * Implement more features to the ContainerAware Controller
  * Potentially extend the functionality of the Silex\Application to allow
    automatic dependency injection, similar to Laravel
