<?php

global $app;

$login = $app['controllers_factory'];

$login->get('/', 'controller.login:authenticateAction')
    ->bind('login');

$login->get('/account', 'controller.login:accountAction')
    ->bind('account');

return $login;