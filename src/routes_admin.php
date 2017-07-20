<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

global $app;

// This pages are protected from app.php - $app['security.firewalls']
$admin = $app['controllers_factory'];
$admin->get('/', function () {
    return 'Admin home page';
});
$admin->get('/test', function () {
    return 'Admin test page, it must be protected';
});
$admin->get('/admin_login_check', function () {
    return 'Logged';
});
$app->get('/personas', 'controller.person:indexAction')
    ->bind('people');
$app->get('/persona/crear', 'controller.person:addAction')
    ->bind("person_add");
$app->get('/persona/editar/{id}', 'controller.person:editAction')
    ->bind("person_edit");
$app->post('/persona/grabar', 'controller.person:saveAction')
    ->bind("person_save");
$app->get('/persona/borrar/{id}', 'controller.person:deleteAction')
    ->bind("person_delete");

$app->get('cartera/crear', 'controller.portfolio:addAction')
    ->bind('portfolio_add');

$app->get('servicio/crear', 'controller.service:addAction')
    ->bind('service_add');

$app->get('/unidad/crear', 'controller.unit:addAction')
    ->bind("unit_add");
$app->get('/unidad/editar/{id}', 'controller.unit:editAction')
    ->bind("unit_edit");
$app->post('/unidad/grabar', 'controller.unit:saveAction')
    ->bind("unit_save");
$app->get('/unidad/borrar/{id}', 'controller.unit:deleteAction')
    ->bind("unit_delete");

// ensure that all Controller require logged-in users
$admin->before(function (Request $request) use ($app) {
    // redirect the user to the login screen if access to the Resource is protected
    if ($app['security.authorization_checker']->isGranted('ROLE_ADMIN')) {
        // ...
    }

    if (true) {
        return new RedirectResponse('login');
    }
});


return $admin;