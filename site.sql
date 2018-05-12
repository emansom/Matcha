BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `site_menu` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `parent_id` INTEGER NOT NULL DEFAULT 0,
  `order_id` INTEGER NOT NULL,
  `caption` TEXT NOT NULL,
  `link` TEXT NOT NULL,
  `controller` TEXT NOT NULL,
  `action` TEXT NOT NULL,
  `icon` TEXT NOT NULL,
  `visibility` INTEGER NOT NULL DEFAULT 0 /* '0 = Never, 1 = Always, 2 = Logged in only, 3 = Guests only, 4 = Staff only' */
);
/* Home tab */
INSERT INTO `site_menu` VALUES (1,0,1,'Home','/','index','index','tab_icon_01_home.gif',1);

/* Hotel tab */
INSERT INTO `site_menu` VALUES (2,0,1,'New?','/hotel','hotel','index','tab_icon_02_hotel.gif',1);
INSERT INTO `site_menu` VALUES (3,2,1,'New here?','/hotel','hotel','index','',1);
INSERT INTO `site_menu` VALUES (4,2,1,'Guides','/hotel/welcome','hotel','welcome','',1);
INSERT INTO `site_menu` VALUES (5,2,1,'Getting Started','/hotel/tour','hotel','tour','',1);
INSERT INTO `site_menu` VALUES (6,2,1,'Furniture','/hotel/furniture','hotel','furniture','',1);
INSERT INTO `site_menu` VALUES (7,2,1,'Pets','/hotel/pets','hotel','pets','',1);
INSERT INTO `site_menu` VALUES (8,2,1,'Homepages','/hotel/homes','hotel','homes','',1);
INSERT INTO `site_menu` VALUES (9,2,1,'Games','/hotel/games','hotel','games','',1);
INSERT INTO `site_menu` VALUES (10,2,1,'Badges','/hotel/badges','hotel','badges','',1);
INSERT INTO `site_menu` VALUES (11,2,1,'Groups','/groups','groups','index','',1);
INSERT INTO `site_menu` VALUES (13,2,1,'Staff','/hotel/team','hotel','team','',1);

/* Club tab */
INSERT INTO `site_menu` VALUES (14,0,1,'Club','/club','club','index','tab_icon_09_hc.gif',1);
INSERT INTO `site_menu` VALUES (15,14,1,'Benefits','/club','club','index','',1);
INSERT INTO `site_menu` VALUES (16,14,1,'Join or Extend Membership','/club/join','club','join','',1);
INSERT INTO `site_menu` VALUES (17,14,1,'Shop','/club/shop','club','shop','',1);
END TRANSACTION;