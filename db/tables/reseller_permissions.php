<?php

/**
 * Per-reseller capability flags (the `Reseller Panel` module).
 *
 * One row per reseller. A missing row means "use the defaults from
 * config/reseller.php", which is why the module reads through a service that
 * merges defaults rather than querying this table directly.
 *
 * `allowed_locations` / `allowed_types` hold JSON arrays of panel names and
 * panel driver types; NULL means "no restriction beyond the global config".
 */

return [
    'create' => <<<SQL
        reseller_id INT UNSIGNED NOT NULL PRIMARY KEY,
        can_create_config TINYINT(1) NOT NULL DEFAULT 1,
        can_delete_config TINYINT(1) NOT NULL DEFAULT 1,
        can_renew TINYINT(1) NOT NULL DEFAULT 1,
        can_extra_volume TINYINT(1) NOT NULL DEFAULT 1,
        can_extra_time TINYINT(1) NOT NULL DEFAULT 1,
        can_change_loc TINYINT(1) NOT NULL DEFAULT 1,
        can_manage_users TINYINT(1) NOT NULL DEFAULT 1,
        can_view_reports TINYINT(1) NOT NULL DEFAULT 1,
        allowed_locations TEXT NULL,
        allowed_types TEXT NULL,
        CONSTRAINT fk_reseller_permissions_reseller FOREIGN KEY (reseller_id) REFERENCES resellers (id) ON DELETE CASCADE
        SQL,
    'columns' => [
        ['can_create_config', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_delete_config', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_renew', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_extra_volume', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_extra_time', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_change_loc', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_manage_users', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['can_view_reports', '1', 'TINYINT(1) NOT NULL DEFAULT 1'],
        ['allowed_locations', null, 'TEXT'],
        ['allowed_types', null, 'TEXT'],
    ],
];
