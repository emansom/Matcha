-- migrate:up
INSERT INTO settings (setting, value) VALUES ('loader.dcr', 'https://images.oldhabbo.com/dcr/v21/habbo.dcr');
INSERT INTO settings (setting, value) VALUES ('loader.external_variables', 'https://images.oldhabbo.com/dcr/v21/external_variables.txt');
INSERT INTO settings (setting, value) VALUES ('loader.external_texts', 'https://images.oldhabbo.com/dcr/v21/external_texts.txt');
INSERT INTO settings (setting, value) VALUES ('loader.server_host', '127.0.0.1');
INSERT INTO settings (setting, value) VALUES ('loader.server_port', '12321');
INSERT INTO settings (setting, value) VALUES ('loader.mus_host', '127.0.0.1');
INSERT INTO settings (setting, value) VALUES ('loader.mus_port', '12322');
INSERT INTO settings (setting, value) VALUES ('loader.rcon_host', '127.0.0.1');
INSERT INTO settings (setting, value) VALUES ('loader.rcon_port', '12309');

-- migrate:down
DELETE FROM settings WHERE setting = 'loader.dcr' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.external_variables' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.external_texts' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.server_host' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.server_port' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.mus_host' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.mus_port' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.rcon_host' LIMIT 1;
DELETE FROM settings WHERE setting = 'loader.rcon_port' LIMIT 1;