<?php
// configure your app for the production environment
// This must go outside version system !!!

date_default_timezone_set('Europe/Madrid');

// enable the debug mode
$app['debug'] = true;

// DoctrineServiceProvider opciones para la BD

$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'dbname' => 'portus',
    'host' => 'localhost',
    'user' => 'oportus',
    'password' => 'a_very_very_very_STRONG_password',
    'charset' => 'utf8',
    'driverOptions' => array(1002 => 'SET NAMES utf8'),
);

$app['kernel.private_upload_dir'] = '/var/private_upload/';