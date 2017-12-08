<?php

/*
 +------------------------------------------------------------------------+
 | ZPhal                                                                  |
 +------------------------------------------------------------------------+
 | Copyright (c) 2017 ZPhal Team and contributors                         |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to gzp@goozp.com so we can send you a copy immediately.                |
 +------------------------------------------------------------------------+
*/

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL); // testing use

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers the services that
     * provide a full stack framework. These default services can be overidden with custom ones.
     */
    $di = new FactoryDefault();

    /**
     * 应用部署环境
     */
    $environment = env('APP_ENV', 'development');
    defined('APPLICATION_ENV') || define('APPLICATION_ENV', $environment);

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Include general services
     */
    require APP_PATH . '/config/services.php';

    /**
     * Include web environment specific services
     */
    require APP_PATH . '/config/services_web.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Register application modules
     */
    $application->registerModules([
        'frontend' => [
            'className' => 'ZPhal\Modules\Frontend\Module',
            'path'      => APP_PATH . '/modules/frontend/Module.php',
        ],
        'admin' => [
            'className' => 'ZPhal\Modules\Admin\Module',
            'path'      => APP_PATH . '/modules/admin/Module.php',
        ]
    ]);

    /**
     * Include routes
     */
    require APP_PATH . '/config/routes.php';

    // echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());
    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
