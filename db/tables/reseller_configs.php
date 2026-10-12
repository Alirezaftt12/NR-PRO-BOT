<?php

/**
 * Configs created by a reseller (the `Reseller Panel` module).
 *
 * Source of truth for config ownership. `invoice_id` points at the mirrored
 * `invoice` row that the bot's cron jobs (disableconfig, activeconfig,
 * on_hold) pick up, which is what gives reseller configs automatic expiry
 * handling. It is an indexed soft link, not a FOREIGN KEY, because `invoice`
 * rows are pruned by cronbot/optimize_order.php.
 *
 * `status` is pending -> active, or pending -> failed when provisioning fails
 * and the wallet debit is refunded.
 */

return [
    'create' => <<<SQL
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        reseller_id INT UNSIGNED NOT NULL,
        reseller_user_id INT UNSIGNED NULL,
        invoice_id VARCHAR(200) NULL,
        username VARCHAR(200) NOT NULL,
        location VARCHAR(200) NOT NULL,
        product_code VARCHAR(200) NULL,
        protocol VARCHAR(50) NULL,
        volume_gb INT NOT NULL DEFAULT 0,
        days INT NOT NULL DEFAULT 0,
        device_limit INT NOT NULL DEFAULT 0,
        sub_link TEXT NULL,
        price INT NOT NULL DEFAULT 0,
        status VARCHAR(30) NOT NULL DEFAULT 'pending',
        created_at VARCHAR(20) NOT NULL DEFAULT '0',
        expire_at VARCHAR(20) NULL,
        CONSTRAINT fk_reseller_configs_reseller FOREIGN KEY (reseller_id) REFERENCES resellers (id) ON DELETE CASCADE,
        CONSTRAINT fk_reseller_configs_user FOREIGN KEY (reseller_user_id) REFERENCES reseller_users (id) ON DELETE SET NULL
        SQL,
    'columns' => [
        ['reseller_user_id', null, 'INT UNSIGNED NULL'],
        ['invoice_id', null, 'VARCHAR(200)'],
        ['product_code', null, 'VARCHAR(200)'],
        ['protocol', null, 'VARCHAR(50)'],
        ['volume_gb', '0', 'INT NOT NULL DEFAULT 0'],
        ['days', '0', 'INT NOT NULL DEFAULT 0'],
        ['device_limit', '0', 'INT NOT NULL DEFAULT 0'],
        ['sub_link', null, 'TEXT'],
        ['price', '0', 'INT NOT NULL DEFAULT 0'],
        ['status', 'pending', 'VARCHAR(30)'],
        ['created_at', '0', 'VARCHAR(20)'],
        ['expire_at', null, 'VARCHAR(20)'],
    ],
];
