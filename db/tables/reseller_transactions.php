<?php

/**
 * Wallet ledger for resellers (the `Reseller Panel` module).
 *
 * The balance itself lives on the reseller's linked `user.Balance` row, so
 * these rows are the audit trail: every debit, credit, refund and manual
 * adjustment written in the same transaction as the balance change.
 *
 * `balance_after` records the balance as observed inside that transaction so
 * the ledger can be reconciled against `user.Balance` without replaying it.
 */

return [
    'create' => <<<SQL
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        reseller_id INT UNSIGNED NOT NULL,
        type VARCHAR(30) NOT NULL,
        amount INT NOT NULL DEFAULT 0,
        balance_after INT NOT NULL DEFAULT 0,
        description VARCHAR(500) NULL,
        ref VARCHAR(200) NULL,
        created_at VARCHAR(20) NOT NULL DEFAULT '0',
        CONSTRAINT fk_reseller_transactions_reseller FOREIGN KEY (reseller_id) REFERENCES resellers (id) ON DELETE CASCADE
        SQL,
    'columns' => [
        ['type', 'debit', 'VARCHAR(30)'],
        ['amount', '0', 'INT NOT NULL DEFAULT 0'],
        ['balance_after', '0', 'INT NOT NULL DEFAULT 0'],
        ['description', null, 'VARCHAR(500)'],
        ['ref', null, 'VARCHAR(200)'],
        ['created_at', '0', 'VARCHAR(20)'],
    ],
];
