<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
);

$loader->registerClasses(
    [
        "Kepler\Security"                      => $config->application->libraryDir . "Argon2Hash.php",
        "Kepler\ExternalTextsTranslateAdapter" => $config->application->libraryDir . "ExternalTextsTranslateAdapter.php",
        "Kepler\PageElements"                  => $config->application->libraryDir . "PageElements.php",
        "GameConfiguration"                    => $config->application->libraryDir . "GameConfiguration.php"
    ]
);

/**
 * Register Files, composer autoloader
 */
$loader->registerFiles(
    [
        APP_PATH . '/vendor/autoload.php'
    ]
);

$loader->register();
