<?php

use Phalcon\Mvc\Router as Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Text;

use Kepler\Security as Security;
use Kepler\ExternalTextsTranslateAdapter as ExternalTextsTranslateAdapter;
use Kepler\PageElements as PageElements;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Add routing capabilities
 */
$di->set("router", function () {
    return include APP_PATH . "/config/router.php";
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            $volt->getCompiler()->addFunction('_', function ($resolvedArgs, $exprArgs) {
                return sprintf('$t->_(\'%s\')', $exprArgs[0]['expr']['value']);
            });

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
});

$di->set('dispatcher', function () {
    // Create an EventsManager
    $eventsManager = new EventsManager();

    // Camelize actions
    $eventsManager->attach(
        'dispatch:beforeDispatchLoop',
        function (Event $event, $dispatcher) {
            $dispatcher->setActionName(
                Text::lower(Text::camelize($dispatcher->getActionName()))
            );
        }
    );

    $dispatcher = new MvcDispatcher();

    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

/**
 * Register a user component
 */
$di->set("elements", function () {
    return new PageElements();
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'dbname'   => $config->database->dbname
    ];

    if (strtolower($config->database->adapter) == 'postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);

    // Use WAL mode for SQLite
    if (strtolower($config->database->adapter) == 'sqlite') {
        // Configure SQLite to use WAL
        if ($connection->execute("PRAGMA journal_mode=WAL;") !== true) {
            throw new \Phalcon\Exception('Could not configure SQLite to use WAL mode');
        }

        // Configure a busy timeout to mitigate potential race condition with emulator
        if ($connection->execute("PRAGMA busy_timeout=300;") !== true) {
            throw new \Phalcon\Exception('Could not configure SQLite timeout');
        }
    }

    return $connection;
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Inject modified Security to use Argon2 hashing functions
 */
$di->setShared('security', function() {
    return new Security();
});

/**
 * Inject modified Translation to use external_texts for locales
 */
$di->setShared('translation', function() {
    $config = $this->getConfig();
    $language = $this->getRequest()->getBestLanguage();

    // Get list of available languages
    // TODO: reduce I/O by caching result in APCu
    // TODO: clean up code
    $availableLanguages = array_diff(array_map(function($filename) {
        return str_replace(".txt", "", $filename);
    }, scandir($config->application->localeDir)), array('..', '.'));

    // Check if we have the language requested, revert to default if not
    if (!in_array($language, $availableLanguages)) {
        $language = $config->application->defaultLanguage;
    }

    return new ExternalTextsTranslateAdapter(
       [
           "file" => $config->application->localeDir . $language . ".txt",
       ]
    );
});
