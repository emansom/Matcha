-- migrate:up
ALTER TABLE settings MODIFY COLUMN value TEXT DEFAULT '' NOT NULL;

-- migrate:down
ALTER TABLE settings MODIFY COLUMN value VARCHAR(200) DEFAULT '' NOT NULL;
