-- migrate:up
UPDATE site_menu SET action = 'benefits' WHERE controller = 'club' AND action = 'index' AND icon = '';

-- migrate:down

