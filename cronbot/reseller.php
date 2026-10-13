<?php

// Recovery/maintenance for reseller rows. This runs from the existing cron
// dispatcher and never exposes a web endpoint.
require_once dirname(__DIR__) . '/modules/Reseller/bootstrap.php';

use Reseller\Container;
use Reseller\Repositories\ResellerConfigRepository;
use Reseller\Repositories\ResellerRepository;
use Reseller\Services\AuditService;
use Reseller\Services\WalletService;

if (!reseller_config('enabled', true)) {
    return;
}

$resellers = Container::get(ResellerRepository::class);
$configs = Container::get(ResellerConfigRepository::class);
$audit = Container::get(AuditService::class);
$pdo = Container::pdo();

foreach ($resellers->findExpiredActive(time()) as $row) {
    $id = (int) $row['id'];
    $resellers->update($id, ['status' => 'expired']);
    $audit->log($id, AuditService::ACTION_ADMIN_STATUS, (string) ($row['username'] ?? ''), ['status' => 'expired'], 'cron');
}

$olderThan = max(60, (int) reseller_config('creation.max_pending_minutes', 15) * 60);
$wallet = Container::get(WalletService::class);
foreach ($configs->stalePending($olderThan) as $row) {
    $id = (int) $row['id'];
    $resellerId = (int) $row['reseller_id'];
    $reseller = $resellers->find($resellerId);
    if (!$reseller || empty($reseller['user_id'])) {
        if ($configs->markFailedById($id)) {
            $audit->log($resellerId, AuditService::ACTION_CONFIG_FAILED, (string) ($row['username'] ?? ''), ['config_id' => $id, 'reason' => 'missing_wallet_user'], 'cron');
        }
        continue;
    }

    // Claim and refund in one transaction. The conditional UPDATE locks the
    // row, so a concurrent completion either wins before this claim or sees
    // the failed state and cannot turn one debit into two refunds.
    $pdo->beginTransaction();
    try {
        if (!$configs->markFailedById($id)) {
            $pdo->rollBack();
            continue;
        }
        $wallet->credit($resellerId, (string) $reseller['user_id'], (int) ($row['price'] ?? 0), 'refund', 'Refund stale reseller config', (string) ($row['username'] ?? $id));
        $audit->log($resellerId, AuditService::ACTION_CONFIG_FAILED, (string) ($row['username'] ?? ''), ['config_id' => $id, 'reason' => 'stale_pending'], 'cron');
        $pdo->commit();
    } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log('reseller stale pending recovery failed: ' . $e->getMessage());
    }
}

$audit->pruneFiles();
