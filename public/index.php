<?php
use Phalcon\Di\FactoryDefault;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

/**
 * The FactoryDefault Dependency Injector automatically registers
 * the services that provide a full stack framework.
 */
$di = new FactoryDefault();

/**
 * Handle routes
 */
//include APP_PATH . '/config/router.php';

/**
 * Read services
 */
include APP_PATH . '/config/services.php';

/**
 * Get config service for use in inline setup below
 */
$config = $di->getConfig();

/**
 * Include Autoloader
 */
include APP_PATH . '/config/loader.php';

if ($config->application->debug) {
    $profiler = new \Fabfuel\Prophiler\Profiler();

    $di->set('profiler', $profiler, true);

    $pluginManager = new \Fabfuel\Prophiler\Plugin\Manager\Phalcon($profiler);
    $pluginManager->register();

    $profiler->addAggregator(new \Fabfuel\Prophiler\Aggregator\Database\QueryAggregator());
    $profiler->addAggregator(new \Fabfuel\Prophiler\Aggregator\Cache\CacheAggregator());
}

/**
 * Handle the request
 */
$application = new \Phalcon\Mvc\Application($di);
$response = $application->handle();

echo str_replace(["\n","\r","\t"], '', $response->getContent());

if ($config->application->debug) {
    if (!$response->isSent()) {
        $profiler = $di->get('profiler');
        $toolbar = new \Fabfuel\Prophiler\Toolbar($profiler);
        $toolbar->addDataCollector(new \Fabfuel\Prophiler\DataCollector\Request());
        echo $toolbar->render();
    }
}