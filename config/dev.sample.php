<?php

use Silex\Provider\WebProfilerServiceProvider;

//use Silex\Provider\DoctrineServiceProvider;
//use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

// include the prod configuration
require __DIR__ . '/prod.php';

// enable the debug mode
$app['debug'] = true;

$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__ . '/../var/cache/profiler'
));
