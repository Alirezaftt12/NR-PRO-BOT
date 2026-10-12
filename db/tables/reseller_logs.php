<?php

/**
 * Activity log for the `Reseller Panel` module.
 *
 * Written by AuditService for both reseller actions and admin actions taken
 * against a reseller, so `actor` is a reseller username or an admin username.
 * `reseller_id` is nullable so a failed login for an unknown username can
 * still be recorded.
 */

return [
    'create' => <<<SQL
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        reseller_id INT UNSIGNED NULL,
        actor VARCHAR(200) NULL,
        action VARCHAR(100) NOT NULL,
        target VARCHAR(200) NULL,
        details TEXT NULL,
        ip VARCHAR(64) NULL,
        created_at VARCHAR(20) NOT NULL DEFAULT '0',
        CONSTRAINT fk_reseller_logs_reseller FOREIGN KEY (reseller_id) REFERENCES resellers (id) ON DELETE CASCADE
        SQL,
    'columns' => [
        ['reseller_id', null, 'INT UNSIGNED NULL'],
        ['actor', null, 'VARCHAR(200)'],
        ['action', 'unknown', 'VARCHAR(100)'],
        ['target', null, 'VARCHAR(200)'],
        ['details', null, 'TEXT'],
        ['ip', null, 'VARCHAR(64)'],
        ['created_at', '0', 'VARCHAR(20)'],
    ],
];
