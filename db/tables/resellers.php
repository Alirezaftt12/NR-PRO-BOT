<?php

/**
 * Reseller accounts (the `Reseller Panel` module).
 *
 * `user_id` links the reseller to a `user` row, which is where the wallet
 * balance lives (`user.Balance`) and where a Telegram identity would come from.
 * The link is intentionally a plain indexed column rather than a FOREIGN KEY:
 * `user` rows are created and deleted by the bot's own flows (index.php:86,
 * cronbot/optimize_order.php) and `user.id` is a VARCHAR(500) utf8mb4 primary
 * key, so a hard constraint here would break existing write paths.
 *
 * Quota columns use 0 to mean "unlimited"; the module falls back to
 * `config/reseller.php` defaults when a value is 0.
 */

return [
    'create' => <<<SQL
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id VARCHAR(500) NULL,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        name VARCHAR(200) NULL,
        status VARCHAR(20) NOT NULL DEFAULT 'active',
        created_by VARCHAR(200) NULL,
        created_at VARCHAR(20) NOT NULL DEFAULT '0',
        last_login VARCHAR(20) NULL,
        last_ip VARCHAR(64) NULL,
        expire VARCHAR(20) NULL,
        max_customers INT NOT NULL DEFAULT 0,
        max_configs INT NOT NULL DEFAULT 0,
        max_volume_gb INT NOT NULL DEFAULT 0,
        max_days INT NOT NULL DEFAULT 0,
        max_devices INT NOT NULL DEFAULT 0,
        used_volume_gb INT NOT NULL DEFAULT 0,
        discount_percent INT NOT NULL DEFAULT 0,
        price_overrides TEXT NULL
        SQL,
    'columns' => [
        ['name', null, 'VARCHAR(200)'],
        ['status', 'active', 'VARCHAR(20)'],
        ['created_by', null, 'VARCHAR(200)'],
        ['created_at', '0', 'VARCHAR(20)'],
        ['last_login', null, 'VARCHAR(20)'],
        ['last_ip', null, 'VARCHAR(64)'],
        ['expire', null, 'VARCHAR(20)'],
        ['max_customers', '0', 'INT NOT NULL DEFAULT 0'],
        ['max_configs', '0', 'INT NOT NULL DEFAULT 0'],
        ['max_volume_gb', '0', 'INT NOT NULL DEFAULT 0'],
        ['max_days', '0', 'INT NOT NULL DEFAULT 0'],
        ['max_devices', '0', 'INT NOT NULL DEFAULT 0'],
        ['used_volume_gb', '0', 'INT NOT NULL DEFAULT 0'],
        ['discount_percent', '0', 'INT NOT NULL DEFAULT 0'],
        ['price_overrides', null, 'TEXT'],
    ],
];
