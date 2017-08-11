<?php

$router = $di->getRouter();

$router->add(
    '/admin/:controller/:action/:params',
    [
        'module'     => 'admin',
        'controller' => 1,
        'action'     => 2,
    ]
);
$router->add(
    '/admin/:params',
    [
        'module'     => 'admin',
        'controller' => 'index',
        'action'     => 'index',
        'params'     => 1
    ]
);
$router->add(
    '/admin/:controller/:params',
    [
        'module'     => 'admin',
        'controller' => 1,
        'action'     => 'index',
        'params'     => 2
    ]
);
$router->add(
    '/login',
    [
        'module'     => 'admin',
        'controller' => 'login',
        'action'     => 'index',
    ]
);
