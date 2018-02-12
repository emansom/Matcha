-- migrate:up
CREATE TABLE `site_menu` (
  `id` TINYINT AUTO_INCREMENT,
  `parent_id` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `order_id` TINYINT UNSIGNED NOT NULL,
  `caption` VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
  `link` VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
  `controller` VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL,
  `action` VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL,
  `icon` VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL,
  `visibility` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `site_menu` VALUES (1,0,1,'Home','/','index','index','tab_icon_01_home.gif',1);
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
INSERT INTO `site_menu` VALUES (12,2,1,'Staff','/hotel/team','hotel','team','',1);
INSERT INTO `site_menu` VALUES (13,0,1,'Club','/club','club','index','tab_icon_09_hc.gif',1);
INSERT INTO `site_menu` VALUES (14,13,1,'Benefits','/club','club','benefits','',1);
INSERT INTO `site_menu` VALUES (15,13,1,'Join or Extend Membership','/club/join','club','join','',1);
INSERT INTO `site_menu` VALUES (16,13,1,'Shop','/club/shop','club','shop','',1);

-- migrate:down
DROP TABLE `site_menu`;
