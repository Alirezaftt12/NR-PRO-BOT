<?php

/**
 * A reseller's own customers (the `Reseller Panel` module).
 *
 * Source of truth for ownership. `user_id` points at the mirrored `user` row
 * when one was created for this customer; it is an indexed soft link, not a
 * FOREIGN KEY, for the same reason documented in `resellers.php`.
 */

return [
    'create' => <<<SQL
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        reseller_id INT UNSIGNED NOT NULL,
        user_id VARCHAR(500) NULL,
        name VARCHAR(200) NULL,
        phone VARCHAR(100) NULL,
        note TEXT NULL,
        status VARCHAR(20) NOT NULL DEFAULT 'active',
        created_at VARCHAR(20) NOT NULL DEFAULT '0',
        CONSTRAINT fk_reseller_users_reseller FOREIGN KEY (reseller_id) REFERENCES resellers (id) ON DELETE CASCADE
        SQL,
    'columns' => [
        ['user_id', null, 'VARCHAR(500)'],
        ['name', null, 'VARCHAR(200)'],
        ['phone', null, 'VARCHAR(100)'],
        ['note', null, 'TEXT'],
        ['status', 'active', 'VARCHAR(20)'],
        ['created_at', '0', 'VARCHAR(20)'],
    ],
];
