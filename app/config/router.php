<?php

use Phalcon\Mvc\Router;

$router = new Router(false);

// If you can produce more readable regexes, please contribute!
$router->add(
    // Match / with optional query
    '/(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'index',
        'action' => 'index'
    ]
)->setName('index');

$router->add(
    // Match /hotel, /hotel/{action}, all with optional trailing slash and query
    '/hotel[/]{0,1}(welcome|tour|furniture|pets|homes|web|games|badges|team){0,1}[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'hotel',
        'action' => 1
    ]
)->setName('hotel');

$router->add(
    // Match /club, /club/{action}, all with optional trailing slash and query
    '/club[/]{0,1}(join|shop){0,1}[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'club',
        'action' => 1
    ]
)->setName('club');

$router->add(
    // Match /footer_pages/{action} with optional trailing slash and query
    '/footer_pages/(privacy_policy|terms_and_conditions)[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'index',
        'action' => 1
    ]
)->setName('footer_pages');

$router->add(
    '/login[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'account',
        'action'     => 'login'
    ]
)->setName('login');

$router->add(
    '/account/logout[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'account',
        'action'     => 'logout'
    ]
)->setName('logout');

$router->add(
    '/register[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'register',
        'action'     => 'index'
    ]
)->setName('register');

$router->add(
    '/client[/]{0,1}(\/?\?{0}|\/?\?{1}.*)',
    [
        'controller' => 'index',
        'action'     => 'client'
    ]
)->setName('client');

$router->notFound(array(
    "controller" => "index",
    "action" => "notFound"
));

return $router;
