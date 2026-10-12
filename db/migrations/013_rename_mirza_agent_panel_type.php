<?php

/**
 * Panel type renamed by the NR PRO BOT rebrand: `Nrpro_agent` -> `nr_agent`.
 *
 * `PanelRegistry` maps the stored `marzban_panel.type` value to a driver class,
 * so rows written before the rename would resolve to no driver and every panel
 * operation on those panels would fail with "Panel Not Found". This migration
 * moves the existing rows onto the new key.
 *
 * Idempotent: on a fresh install no row matches the old value and the UPDATE
 * affects nothing.
 */

return static function (PDO $pdo, Schema $schema): void {
    if (!$schema->tableExists('marzban_panel') || !$schema->hasColumn('marzban_panel', 'type')) {
        return;
    }

    $stmt = $pdo->prepare('UPDATE `marzban_panel` SET `type` = :new WHERE `type` = :old');
    $stmt->execute([':new' => 'nr_agent', ':old' => 'Nrpro_agent']);
};
