<?php

declare(strict_types=1);

require_once __DIR__ . '/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$store = json_read(data_file('store'), []);
$userId = (int) $_SESSION['user_id'];
$user = null;
foreach ($store['users'] ?? [] as $candidate) {
    if ((int) ($candidate['id'] ?? 0) === $userId) { $user = $candidate; break; }
}

if (!$user) {
    session_destroy();
    header('Location: /login.php');
    exit;
}

$orders = array_values(array_filter($store['orders'] ?? [], static fn($order) => (int)($order['user_id'] ?? 0) === $userId));
?>
<!doctype html><html lang="uz"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>WebHub — Kabinet</title><style>body{margin:0;background:#f5f5f7;color:#1d1d1f;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}.wrap{width:min(1000px,calc(100% - 32px));margin:80px auto}.top{display:flex;justify-content:space-between;align-items:center;margin-bottom:35px}.card{padding:25px;border-radius:24px;background:#fff;border:1px solid rgba(0,0,0,.06);margin:12px 0}.muted{color:#6e6e73}a{color:inherit;text-decoration:none}</style></head><body><main class="wrap"><div class="top"><div><div class="muted">WebHub kabinet</div><h1>Salom, <?= htmlspecialchars((string)$user['name'], ENT_QUOTES, 'UTF-8') ?>.</h1></div><a href="/logout.php">Chiqish</a></div><section><h2>Buyurtmalar</h2><?php if (!$orders): ?><div class="card muted">Hozircha buyurtmalaringiz mavjud emas.</div><?php else: foreach($orders as $order): ?><article class="card"><strong><?= htmlspecialchars((string)$order['title'], ENT_QUOTES, 'UTF-8') ?></strong><div class="muted"><?= htmlspecialchars((string)$order['status'], ENT_QUOTES, 'UTF-8') ?></div></article><?php endforeach; endif; ?></section></main></body></html>
