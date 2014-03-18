<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Resources')
    ->exclude('Tests')
    ->in(__DIR__.'/src/');

return new Sami($iterator, array(
    'build_dir' => __DIR__.'/docs/build',
    'cache_dir' => __DIR__.'/docs/cache',
    'default_opened_level' => 2,
));

/* End of File: ./sami.php */
