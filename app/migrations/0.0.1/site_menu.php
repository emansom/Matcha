<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class SiteMenuMigration_1
 */
class SiteMenuMigration_1 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('site_menu', [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 4,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'parent_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'order_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'parent_id'
                        ]
                    ),
                    new Column(
                        'caption',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 255,
                            'after' => 'order_id'
                        ]
                    ),
                    new Column(
                        'link',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 255,
                            'after' => 'caption'
                        ]
                    ),
                    new Column(
                        'controller',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 70,
                            'after' => 'link'
                        ]
                    ),
                    new Column(
                        'action',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 70,
                            'after' => 'controller'
                        ]
                    ),
                    new Column(
                        'icon',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 70,
                            'after' => 'action'
                        ]
                    ),
                    new Column(
                        'visibility',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'icon'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY')
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8mb4_general_ci'
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
        // INSERT INTO `site_menu` VALUES (1,0,1,'Home','/','index','index','tab_icon_01_home.gif',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 1,
                'parent_id' => 0,
                'order_id' => 1,
                'caption' => 'Home',
                'link' => '/',
                'controller' => 'index',
                'action' => 'index',
                'icon' => 'tab_icon_01_home.gif',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (2,0,1,'New?','/hotel','hotel','index','tab_icon_02_hotel.gif',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 2,
                'parent_id' => 0,
                'order_id' => 1,
                'caption' => 'New?',
                'link' => '/hotel',
                'controller' => 'hotel',
                'action' => 'index',
                'icon' => 'tab_icon_02_hotel.gif',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (3,2,1,'New here?','/hotel','hotel','index','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 3,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'New here?',
                'link' => '/hotel',
                'controller' => 'hotel',
                'action' => 'index',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (4,2,1,'Guides','/hotel/welcome','hotel','welcome','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 4,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Guides',
                'link' => '/hotel/welcome',
                'controller' => 'hotel',
                'action' => 'welcome',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (5,2,1,'Getting Started','/hotel/tour','hotel','tour','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 5,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Getting Started',
                'link' => '/hotel/tour',
                'controller' => 'hotel',
                'action' => 'tour',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (6,2,1,'Furniture','/hotel/furniture','hotel','furniture','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 6,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Furniture',
                'link' => '/hotel/furniture',
                'controller' => 'hotel',
                'action' => 'furniture',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (7,2,1,'Pets','/hotel/pets','hotel','pets','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 7,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Pets',
                'link' => '/hotel/pets',
                'controller' => 'hotel',
                'action' => 'pets',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (8,2,1,'Homepages','/hotel/homes','hotel','homes','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 8,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Homepages',
                'link' => '/hotel/homes',
                'controller' => 'hotel',
                'action' => 'homes',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (9,2,1,'Games','/hotel/games','hotel','games','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 9,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Games',
                'link' => '/hotel/games',
                'controller' => 'hotel',
                'action' => 'games',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (10,2,1,'Badges','/hotel/badges','hotel','badges','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 10,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Badges',
                'link' => '/hotel/badges',
                'controller' => 'hotel',
                'action' => 'badges',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (11,2,1,'Groups','/groups','groups','index','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 11,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Groups',
                'link' => '/groups',
                'controller' => 'groups',
                'action' => 'index',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (12,2,1,'Staff','/hotel/team','hotel','team','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 12,
                'parent_id' => 2,
                'order_id' => 1,
                'caption' => 'Staff',
                'link' => '/hotel/team',
                'controller' => 'hotel',
                'action' => 'team',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (13,0,1,'Club','/club','club','index','tab_icon_09_hc.gif',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 13,
                'parent_id' => 0,
                'order_id' => 1,
                'caption' => 'Club',
                'link' => '/club',
                'controller' => 'club',
                'action' => 'index',
                'icon' => 'tab_icon_09_hc.gif',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (14,13,1,'Benefits','/club','club','benefits','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 14,
                'parent_id' => 13,
                'order_id' => 1,
                'caption' => 'Benefits',
                'link' => '/club',
                'controller' => 'club',
                'action' => 'benefits',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (15,13,1,'Join or Extend Membership','/club/join','club','join','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 15,
                'parent_id' => 13,
                'order_id' => 1,
                'caption' => 'Join or Extend Membership',
                'link' => '/club/join',
                'controller' => 'club',
                'action' => 'join',
                'icon' => '',
                'visibility' => 1
            ]
        );

        // INSERT INTO `site_menu` VALUES (16,13,1,'Shop','/club/shop','club','shop','',1);
        self::$connection->insert(
            'site_menu',
            [
                'id' => 16,
                'parent_id' => 13,
                'order_id' => 1,
                'caption' => 'Shop',
                'link' => '/club/shop',
                'controller' => 'club',
                'action' => 'shop',
                'icon' => '',
                'visibility' => 1
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
        self::$connection->dropTable('site_menu');
    }

}
