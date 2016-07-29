<?php

namespace Wise\Session;
use Phalcon\Di;
use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Wise\Session\Plugins\NotFoundPlugin as NotFoundPlugin;
use Wise\Session\Plugins\SecurityPlugin as SecurityPlugin;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Wise\Session\Forms' => __DIR__ . '/forms/',
            'Wise\Session\Models' => __DIR__ . '/models/',
            'Wise\Session\Plugins' => __DIR__ . '/plugins/',
            'Wise\Session\Library' => __DIR__ . '/library/',
            'Wise\Session\Controllers' => __DIR__ . '/controllers/',
        ));

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Read configuration
         */
        $config = include APP_PATH . "/apps/session/config/config.php";


         /**
         * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
         */
        $eventsManager = new EventsManager;
        //$eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin);
        $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);
        //$di->setEventsManager($eventsManager);

        /**
         * Setting up the view component
         */
        $di->setShared('view', function () use ($config) {

            $view = new View();

            $view->setViewsDir($config->application->viewsDir);

            $view->registerEngines(array(
                '.volt' => function ($view, $di) use ($config) {

                    $volt = new VoltEngine($view, $di);

                    $volt->setOptions(array(
                        'compiledPath' => $config->application->cacheDir,
                        'compiledSeparator' => '_'
                    ));

                    return $volt;
                },
                '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
            ));

            return $view;
        });

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            $config = $config->database->toArray();

            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $config['adapter'];
            unset($config['adapter']);

            return new $dbAdapter($config);
        };
    }
}
