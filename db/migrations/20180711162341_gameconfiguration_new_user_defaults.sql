-- migrate:up
INSERT INTO settings (setting, value) VALUES ('new_user.gender', 'M');
INSERT INTO settings (setting, value) VALUES ('new_user.figure', 'hr-145-42.hd-209-1.ch-220-87.lg-270-76.sh-305-89.ha-1018-.ea-1401-62.wa-2007-');
INSERT INTO settings (setting, value) VALUES ('new_user.motto', 'de kepler whey');
INSERT INTO settings (setting, value) VALUES ('new_user.credits', '200');
INSERT INTO settings (setting, value) VALUES ('new_user.console_motto', 'I\'m a new user!');

-- migrate:down
DELETE FROM settings WHERE setting = 'new_user.gender' LIMIT 1;
DELETE FROM settings WHERE setting = 'new_user.figure' LIMIT 1;
DELETE FROM settings WHERE setting = 'new_user.motto' LIMIT 1;
DELETE FROM settings WHERE setting = 'new_user.credits' LIMIT 1;
DELETE FROM settings WHERE setting = 'new_user.console_motto' LIMIT 1;
