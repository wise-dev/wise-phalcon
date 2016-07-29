<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);

$path='http://'.$_SERVER['SERVER_NAME'].'/wise/public/xajax_js/';
defined('XAJAX_PATH') || define('XAJAX_PATH', $path);


define('APP_PATH', realpath('..'));

try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/apps/session/config/config.php";

    /**
     * Include services
     */
    require __DIR__ . '/../config/services.php';

    /**
     * Read auto-loader
     */
    include APP_PATH . "/config/loader.php";

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Include modules
     */
    require __DIR__ . '/../config/modules.php';

    /**
     * Include routes
     */
    require __DIR__ . '/../config/routes.php';

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
