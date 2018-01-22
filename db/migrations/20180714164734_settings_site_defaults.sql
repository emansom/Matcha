-- migrate:up
INSERT INTO settings (setting, value) VALUES ('site.shortname', 'Retro');
INSERT INTO settings (setting, value) VALUES ('site.fullname', 'Retro Hotel');
INSERT INTO settings (setting, value) VALUES ('site.footer', '%shortname% is not affiliated with, endorsed, sponsored, or specifically approved by Sulake Corporation Oy or its Affiliates.<br>Sulake is not responsible for any content on %shortname% and the views and opinions expressed herein are not necessarily the views and opinions of Sulake.');

-- migrate:down
DELETE FROM settings WHERE setting = 'site.shortname' LIMIT 1;
DELETE FROM settings WHERE setting = 'site.fullname' LIMIT 1;
DELETE FROM settings WHERE setting = 'site.footer' LIMIT 1;
