<?php

namespace US\Humanox\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;


class LoginController
{

    // Copia de http://silex.sensiolabs.org/doc/2.0/providers/session.html
    public function authenticateAction(Request $request, Application $app)
    {

        $username = $request->server->get('PHP_AUTH_USER', false);
        $password = $request->server->get('PHP_AUTH_PW');

        if ('igor' === $username && 'password' === $password) {
            $app['session']->set('user', array('username' => $username));
            return $app->redirect('account');
        }

        $response = new Response();
        $response->headers->set('WWW-Authenticate', sprintf('Basic realm="%s"', 'site_login'));
        $response->setStatusCode(401, 'Please sign in.');
        return $response;

    }

    public function accountAction(Application $app)
    {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        return "Bienvenido {$user['username']}!";
    }

}