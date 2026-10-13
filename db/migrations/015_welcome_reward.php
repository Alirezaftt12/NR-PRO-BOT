<?php

/** Add the configurable one-time welcome balance reward. */
return static function (PDO $pdo, Schema $schema): void {
    // The declarative table definitions add these columns for new installs;
    // this migration makes the feature available to existing installations.
    if ($schema->tableExists('setting')) {
        $schema->addColumn('setting', 'welcome_reward_status', '0', "VARCHAR(20) NOT NULL DEFAULT '0'");
        $schema->addColumn('setting', 'welcome_reward_amount', '0', "VARCHAR(30) NOT NULL DEFAULT '0'");
    }
    if ($schema->tableExists('user')) {
        $schema->addColumn('user', 'welcome_reward_claimed', '0', 'TINYINT(1) NOT NULL DEFAULT 0');
    }
};
