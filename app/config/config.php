<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'  => 'Mysql',
        'host'     => getenv('MYSQL_HOST') ?: '127.0.0.1',
        'dbname'   => getenv('MYSQL_DATABASE') ?: 'kepler',
        'port'     => getenv('MYSQL_PORT') ?: 3307,
        'username' => getenv('MYSQL_USER') ?: 'kepler',
        'password' => getenv('MYSQL_PASSWORD') ?: 'verysecret',
        'charset'  => 'utf8mb4'
    ],
    'application' => [
        'appDir'           => APP_PATH . '/',
        'controllersDir'   => APP_PATH . '/controllers/',
        'modelsDir'        => APP_PATH . '/models/',
        'migrationsDir'    => APP_PATH . '/migrations/',
        'viewsDir'         => APP_PATH . '/views/',
        'pluginsDir'       => APP_PATH . '/plugins/',
        'libraryDir'       => APP_PATH . '/library/',
        'cacheDir'         => BASE_PATH . '/cache/',
        'localeDir'        => APP_PATH . '/locale/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        //'baseUri'          => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER['PHP_SELF']),
        'baseUri'          => '/',
        'defaultLanguage'  => 'en',
        'footerText'       => '',
        'debug'            => false
    ],
    'emulator' => [
        'serverInternalHost' => getenv('KEPLER_INTERNAL_HOST') ?: '127.0.0.1',
    ],
    'redis' => [
        'host' => getenv('REDIS_HOST') ?: '127.0.0.1',
        'port' => getenv('REDIS_PORT') ?: 6379
        //'socket' => '/run/redis/redis.sock'
    ]
]);
