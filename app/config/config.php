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
        'host'     => getenv('MYSQL_HOST') ?: 'localhost',
        'dbname'   => getenv('MYSQL_DATABASE') ?: 'kepler',
        'port'     => 3306,
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
        'footerText'       => 'oldHabbo is not affiliated with, endorsed, sponsored, or specifically approved by Sulake Corporation Oy or its Affiliates.<br>Sulake is not responsible for any content on oldHabbo and the views and opinions expressed herein are not necessarily the views and opinions of Sulake.',
        'debug'            => false
    ],
    'newUser' => [
        'figure'        => 'hr-145-42.hd-209-1.ch-220-87.lg-270-76.sh-305-89.ha-1018-.ea-1401-62.wa-2007-',
        'gender'        => 'M',
        'motto'         => 'de kepler whey',
        'credits'       => '200',
        'tickets'       => 0,
        'film'          => 0,
        'rank'          => 1,
        'consoleMotto'  => "I'm a new user!",
        'badges'        => ['BE2', 'Z64', 'RTR', 'EAR'],
        'allowStalking' => true
    ],
    'emulator' => [
        'serverExternalHost' => getenv('KEPLER_EXTERNAL_HOST') ?: '127.0.0.1',
        'serverInternalHost' => getenv('KEPLER_INTERNAL_HOST') ?: '127.0.0.1',
        'serverPort' => getenv('KEPLER_PORT') ?: 12321,
        'musPort' => getenv('KEPLER_MUS_PORT') ?: 12322,
        'rconPort' => getenv('KEPLER_RCON_PORT') ?: 12309,
        'rconTTL' => 30 // 30 seconds TTL of RCON cache
    ],
    'client' => [
        'dcr' => 'https://images.oldhabbo.com/dcr/v21/habbo.dcr',
        'externalVariables' => 'https://images.oldhabbo.com/dcr/v21/external_variables.txt',
        'externalTexts' => 'https://images.oldhabbo.com/dcr/v21/external_texts.txt'
    ],
    'redis' => [
        'host' => getenv('REDIS_HOST') ?: '127.0.0.1',
        'port' => getenv('REDIS_PORT') ?: 6379
        //'socket' => '/run/redis/redis.sock'
    ]
]);
