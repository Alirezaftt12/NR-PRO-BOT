<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/function.php';

$rows = $pdo->query("SELECT id_user, bot_token, username, setting FROM botsaz WHERE id_user LIKE 'trial_%'")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $bot) {
    $settings = json_decode((string) ($bot['setting'] ?? '{}'), true);
    $expiresAt = is_array($settings) ? (int) ($settings['trial_expires_at'] ?? 0) : 0;
    if ($expiresAt <= 0 || $expiresAt > time()) {
        continue;
    }

    try {
        telegram('deleteWebhook', [], (string) $bot['bot_token']);
    } catch (Throwable $error) {
        error_log('trial bot webhook cleanup failed: ' . $error->getMessage());
    }

    $runtime = dirname(__DIR__) . '/vpnbot/' . $bot['id_user'] . $bot['username'];
    if (is_dir($runtime)) {
        deleteDirectory($runtime);
    }

    $stmt = $pdo->prepare('DELETE FROM botsaz WHERE id_user = ?');
    $stmt->execute([$bot['id_user']]);
}
