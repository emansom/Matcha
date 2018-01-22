-- migrate:up
INSERT INTO settings (setting, value) VALUES ('new_user.badges', 'BE2,Z64,RTR,EAR');

-- migrate:down
DELETE FROM settings WHERE setting = 'new_user.badges' LIMIT 1;
