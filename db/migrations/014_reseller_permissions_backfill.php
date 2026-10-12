<?php

/**
 * Reseller Panel module: data backfill.
 *
 * The module's tables, columns and indexes are declared in db/tables.php and
 * db/indexes.php, which run before this file on every request. This migration
 * only covers what a declarative definition cannot express: giving every
 * reseller a permissions row.
 *
 * `reseller_permissions` is read through PermissionService, which merges
 * config/reseller.php defaults for a missing row, so a reseller without one
 * still works — this backfill just makes the state explicit and editable.
 *
 * Idempotent: INSERT IGNORE keyed on the primary key, so re-running it on
 * every request is a no-op.
 */

return static function (PDO $pdo, Schema $schema): void {
    if (!$schema->tableExists('resellers') || !$schema->tableExists('reseller_permissions')) {
        return;
    }

    $stmt = $pdo->prepare(
        'INSERT IGNORE INTO `reseller_permissions` (`reseller_id`) ' .
        'SELECT `id` FROM `resellers` WHERE `id` NOT IN (SELECT `reseller_id` FROM `reseller_permissions`)'
    );
    $stmt->execute();
};
