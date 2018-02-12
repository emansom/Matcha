<?php

use Pdp\Domain;

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class SettingsMigration_1
 */
class SettingsMigration_1 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('settings', [
                'columns' => [
                    new Column(
                        'setting',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 50,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'value',
                        [
                            'type' => Column::TYPE_TEXT,
                            'default' => "''",
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'setting'
                        ]
                    )
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8mb4_unicode_ci'
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        // INSERT INTO settings (setting, value) VALUES ('new_user.figure_m', 'hd-208-2.ch-250-64.lg-285-82.sh-290-64.hr-165-45');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'new_user.figure_m',
                'value' => 'hd-208-2.ch-250-64.lg-285-82.sh-290-64.hr-165-45'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('new_user.figure_f', 'hr-545-34.hd-600-1.ch-645-62.lg-715-63.sh-735-63.he-1605-73.ca-1813-');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'new_user.figure_f',
                'value' => 'hr-545-34.hd-600-1.ch-645-62.lg-715-63.sh-735-63.he-1605-73.ca-1813-'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('new_user.motto', 'Hello. I\'m a new user!');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'new_user.motto',
                'value' => 'Hello. I\'m a new user!'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('new_user.console_motto', 'I\'m a new user!');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'new_user.console_motto',
                'value' => 'I\'m a new user!'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('new_user.credits', '200');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'new_user.credits',
                'value' => '200'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('new_user.badges', 'BE2,Z64,RTR,EAR');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'new_user.badges',
                'value' => 'BE2,Z64,RTR,EAR'
            ]
        );

        $externalHostEnv = getenv('KEPLER_EXTERNAL_HOST') ?: 'localhost';
        $externalDomain = new Domain($externalHostEnv);
        $externalHost = $domain->getRegistrableDomain();

        // INSERT INTO settings (setting, value) VALUES ('loader.dcr', 'https://localhost/dcr/v21/habbo.dcr');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.dcr',
                'value' => "https://images.$externalHost/dcr/v21/habbo.dcr"
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.external_variables', 'https://localhost/dcr/v21/external_variables.txt');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.external_variables',
                'value' => "https://images.$externalHost/dcr/v21/external_variables.txt"
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.external_texts', 'https://localhost/dcr/v21/external_texts.txt');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.external_texts',
                'value' => "https://images.$externalHost/dcr/v21/external_variables.txt"
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.server_host', '127.0.0.1');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.server_host',
                'value' => $externalHost
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.server_port', '12321');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.server_port',
                'value' => '12321'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.mus_host', '127.0.0.1');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.mus_host',
                'value' => $externalHost
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.mus_port', '12322');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.mus_port',
                'value' => '12322'
            ]
        );

        $internalHostEnv = getenv('KEPLER_INTERNAL_HOST') ?: '127.0.0.1';
        $internalDomain = new Domain($internalHostEnv);
        $internalHost = $domain->getRegistrableDomain();

        // INSERT INTO settings (setting, value) VALUES ('loader.rcon_host', '127.0.0.1');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.rcon_host',
                'value' => $internalHost
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('loader.rcon_port', '12309');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'loader.rcon_port',
                'value' => '12309'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('site.shortname', 'Retro');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'site.shortname',
                'value' => 'Retro'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('site.fullname', 'Retro Hotel');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'site.fullname',
                'value' => 'Retro Hotel'
            ]
        );

        // INSERT INTO settings (setting, value) VALUES ('site.footer', '%shortname% is not affiliated with, endorsed, sponsored, or specifically approved by Sulake Corporation Oy or its Affiliates.<br>Sulake is not responsible for any content on %shortname% and the views and opinions expressed herein are not necessarily the views and opinions of Sulake.');
        self::$connection->insert(
            'settings',
            [
                'setting' => 'site.footer',
                'value' => '%shortname% is not affiliated with, endorsed, sponsored, or specifically approved by Sulake Corporation Oy or its Affiliates.<br>Sulake is not responsible for any content on %shortname% and the views and opinions expressed herein are not necessarily the views and opinions of Sulake.'
            ]
        );
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        self::$connection->delete('settings', 'setting = ?', ['new_user.figure_m']);
        self::$connection->delete('settings', 'setting = ?', ['new_user.figure_f']);
        self::$connection->delete('settings', 'setting = ?', ['new_user.motto']);
        self::$connection->delete('settings', 'setting = ?', ['new_user.console_motto']);
        self::$connection->delete('settings', 'setting = ?', ['new_user.credits']);
        self::$connection->delete('settings', 'setting = ?', ['new_user.badges']);
        self::$connection->delete('settings', 'setting = ?', ['loader.dcr']);
        self::$connection->delete('settings', 'setting = ?', ['loader.external_variables']);
        self::$connection->delete('settings', 'setting = ?', ['loader.external_texts']);
        self::$connection->delete('settings', 'setting = ?', ['loader.server_host']);
        self::$connection->delete('settings', 'setting = ?', ['loader.server_port']);
        self::$connection->delete('settings', 'setting = ?', ['loader.mus_host']);
        self::$connection->delete('settings', 'setting = ?', ['loader.mus_port']);
        self::$connection->delete('settings', 'setting = ?', ['loader.rcon_host']);
        self::$connection->delete('settings', 'setting = ?', ['loader.rcon_port']);
        self::$connection->delete('settings', 'setting = ?', ['site.shortname']);
        self::$connection->delete('settings', 'setting = ?', ['site.fullname']);
        self::$connection->delete('settings', 'setting = ?', ['site.footer']);
    }

}
