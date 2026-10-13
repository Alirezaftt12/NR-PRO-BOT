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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#07111f">
    <title>پنل تست | NR PRO BOT</title>
    <style>
        :root{color-scheme:dark;--bg:#07111f;--card:rgba(14,29,51,.88);--line:rgba(148,163,184,.18);--text:#f8fafc;--muted:#9fb0c7;--cyan:#45d9ff;--blue:#5487ff;--danger:#ff8f9a}
        *{box-sizing:border-box}
        body{min-height:100vh;margin:0;display:grid;place-items:center;padding:24px;background:radial-gradient(circle at 15% 10%,#164e63 0,transparent 32%),radial-gradient(circle at 90% 90%,#312e81 0,transparent 34%),var(--bg);color:var(--text);font-family:Vazirmatn,Tahoma,Arial,sans-serif;line-height:1.8}
        .shell{width:min(100%,520px)}
        .brand{display:flex;align-items:center;gap:12px;margin:0 0 16px;padding:0 6px;color:#dff9ff;font-size:14px;font-weight:700;letter-spacing:.2px}
        .brand-mark{display:grid;place-items:center;width:42px;height:42px;border:1px solid #57e4ff66;border-radius:14px;background:linear-gradient(135deg,#38bdf855,#6366f155);box-shadow:0 0 28px #22d3ee2e;font-size:21px}
        .card{position:relative;overflow:hidden;padding:32px;border:1px solid var(--line);border-radius:28px;background:linear-gradient(145deg,#10233bdd,var(--card));box-shadow:0 25px 80px #0008,0 0 0 1px #ffffff05 inset;backdrop-filter:blur(18px)}
        .card:before{content:"";position:absolute;top:0;right:12%;left:12%;height:2px;background:linear-gradient(90deg,transparent,var(--cyan),transparent);box-shadow:0 0 22px var(--cyan)}
        h1{margin:0;font-size:clamp(23px,5vw,30px);line-height:1.35;letter-spacing:-.4px}
        .eyebrow{margin:0 0 10px;color:var(--cyan);font-size:12px;font-weight:800;letter-spacing:1px}
        .intro{margin:12px 0 26px;color:var(--muted);font-size:14px}
        .field{margin-top:18px}.field label{display:flex;align-items:center;gap:7px;margin-bottom:8px;color:#d9e6f4;font-size:13px;font-weight:700}
        .input-wrap{position:relative}.input-wrap span{position:absolute;right:14px;top:50%;transform:translateY(-50%);opacity:.75;pointer-events:none}
        input{width:100%;padding:13px 43px 13px 14px;border:1px solid #5c739055;border-radius:14px;outline:0;background:#071423aa;color:var(--text);font:inherit;font-size:14px;transition:.2s}
        input::placeholder{color:#70839c}input:focus{border-color:var(--cyan);box-shadow:0 0 0 4px #22d3ee1c}
        button{width:100%;margin-top:26px;padding:13px 18px;border:0;border-radius:14px;background:linear-gradient(100deg,var(--cyan),#8b9cff);color:#061321;font:inherit;font-size:14px;font-weight:900;cursor:pointer;box-shadow:0 12px 28px #22d3ee2e;transition:transform .2s,filter .2s}
        button:hover{filter:brightness(1.08);transform:translateY(-2px)}
        .alert{display:flex;gap:9px;align-items:flex-start;margin:18px 0;padding:12px 14px;border:1px solid #fb718555;border-radius:14px;background:#7f1d1d40;color:#ffd5d9;font-size:13px}
        .welcome{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:20px 0 14px}.welcome strong{font-size:19px}.welcome small{display:block;color:var(--muted);font-size:12px}
        .status{display:flex;align-items:center;gap:9px;margin:20px 0;padding:15px;border:1px solid #34d39940;border-radius:16px;background:#064e3b45;color:#d1fae5;font-size:13px}.status b{color:#fff}
        .dot{width:9px;height:9px;flex:0 0 9px;border-radius:50%;background:#34d399;box-shadow:0 0 12px #34d399}
        .note{margin:18px 0 0;color:var(--muted);font-size:13px}.logout{display:inline-flex;margin-top:22px;padding:8px 13px;border:1px solid #94a3b833;border-radius:10px;color:#d9e6f4;text-decoration:none;font-size:13px;transition:.2s}.logout:hover{border-color:var(--cyan);color:#fff}
        .footer{margin:16px 0 0;color:#71849d;text-align:center;font-size:11px}
        @media(max-width:480px){body{padding:14px}.card{padding:25px 20px;border-radius:22px}.brand{margin-right:4px}}
    </style>
</head>
<body>
    <main class="shell">
        <div class="brand"><span class="brand-mark">✦</span><span>NR PRO BOT <small>مرکز دسترسی آزمایشی</small></span></div>
        <section class="card">
            <p class="eyebrow">ONE DAY TRIAL</p>
            <h1>پنل وب آزمایشی</h1>
            <?php if ($account): ?>
                <div class="welcome"><div><small>خوش آمدید</small><strong><?= htmlspecialchars((string) ($account['name'] ?: $account['username']), ENT_QUOTES, 'UTF-8') ?> 👋</strong></div><span class="dot" title="فعال"></span></div>
                <div class="status"><span class="dot"></span><span>دسترسی شما تا <b><?= htmlspecialchars((string) $account['expire'], ENT_QUOTES, 'UTF-8') ?></b> فعال است.</span></div>
                <p class="note">ساخت و مدیریت سرویس‌ها از طریق ربات نمایندگی انجام می‌شود. این حساب آزمایشی پس از پایان اعتبار به‌صورت خودکار غیرفعال خواهد شد.</p>
                <a class="logout" href="?logout=1">خروج از حساب ←</a>
            <?php else: ?>
                <p class="intro">برای ورود، نام کاربری و رمز عبوری را که ربات در اختیار شما گذاشته وارد کنید.</p>
                <?php if ($error): ?><div class="alert"><span>⚠</span><span><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></span></div><?php endif; ?>
                <form method="post" autocomplete="off">
                    <div class="field"><label for="username">◉ نام کاربری</label><div class="input-wrap"><span>👤</span><input id="username" name="username" required autocomplete="username" placeholder="نام کاربری آزمایشی را وارد کنید"></div></div>
                    <div class="field"><label for="password">◈ رمز عبور</label><div class="input-wrap"><span>🔒</span><input id="password" name="password" type="password" required autocomplete="current-password" placeholder="رمز عبور را وارد کنید"></div></div>
                    <button type="submit">ورود به پنل تست <span>←</span></button>
                </form>
            <?php endif; ?>
        </section>
        <p class="footer">دسترسی آزمایشی یک‌روزه · امن و اختصاصی</p>
    </main>
</body>
</html>
