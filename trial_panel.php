<?php

declare(strict_types=1);

session_set_cookie_params([
    'httponly' => true,
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'samesite' => 'Lax',
]);
session_start();
require_once __DIR__ . '/config.php';

$error = '';
$account = null;
if (!empty($_SESSION['trial_reseller_id'])) {
    $stmt = $pdo->prepare('SELECT id, username, name, expire FROM resellers WHERE id = ? AND status = \'active\' LIMIT 1');
    $stmt->execute([(int) $_SESSION['trial_reseller_id']]);
    $account = $stmt->fetch() ?: null;
    if (!$account || empty($account['expire']) || strtotime((string) $account['expire']) <= time()) {
        unset($_SESSION['trial_reseller_id']);
        $account = null;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $account === null) {
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    $stmt = $pdo->prepare('SELECT id, username, password, name, expire FROM resellers WHERE username = ? AND status = \'active\' LIMIT 1');
    $stmt->execute([$username]);
    $candidate = $stmt->fetch();
    if ($candidate && !empty($candidate['expire']) && strtotime((string) $candidate['expire']) > time() && password_verify($password, (string) $candidate['password'])) {
        session_regenerate_id(true);
        $_SESSION['trial_reseller_id'] = (int) $candidate['id'];
        header('Location: trial_panel.php');
        exit;
    }
    $error = 'نام کاربری یا رمز عبور نادرست است، یا اعتبار تست به پایان رسیده است.';
}

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: trial_panel.php');
    exit;
}
?><!doctype html>
<html lang="fa" dir="rtl">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>پنل تست NR PRO BOT</title>
<style>body{font-family:Tahoma,Arial;background:#0f172a;color:#e2e8f0;margin:0;padding:32px}.box{max-width:520px;margin:40px auto;background:#1e293b;border:1px solid #334155;border-radius:18px;padding:28px;box-shadow:0 15px 40px #02061799}h1{font-size:22px}label{display:block;margin:16px 0 7px}input{box-sizing:border-box;width:100%;padding:12px;border-radius:10px;border:1px solid #475569;background:#0f172a;color:#fff}button{margin-top:20px;width:100%;padding:12px;border:0;border-radius:10px;background:#38bdf8;color:#082f49;font-weight:bold;cursor:pointer}.muted{color:#94a3b8;line-height:1.8}.err{color:#fecaca;background:#7f1d1d66;border-radius:10px;padding:10px}</style></head>
<body><main class="box"><h1>🖥 پنل وب آزمایشی NR PRO BOT</h1>
<?php if ($account): ?><p>سلام <?= htmlspecialchars((string) ($account['name'] ?: $account['username']), ENT_QUOTES, 'UTF-8') ?> 👋</p><p class="muted">این دسترسی آزمایشی تا <b><?= htmlspecialchars((string) $account['expire'], ENT_QUOTES, 'UTF-8') ?></b> معتبر است.<br>ساخت و مدیریت سرویس‌ها از طریق ربات نمایندگی انجام می‌شود.</p><a href="?logout=1">خروج</a>
<?php else: ?><p class="muted">برای ورود، اطلاعاتی را که ربات در اختیار شما گذاشته وارد کنید.</p><?php if ($error): ?><p class="err"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?><form method="post" autocomplete="off"><label>نام کاربری</label><input name="username" required autocomplete="username"><label>رمز عبور</label><input name="password" type="password" required autocomplete="current-password"><button type="submit">ورود به پنل تست</button></form><?php endif; ?></main></body></html>
