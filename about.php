<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Biz haqimizda — WebHub';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$about = null;
try {
    $stmt = db()->prepare('SELECT title, content, seo FROM pages WHERE slug = :slug AND is_published = 1 LIMIT 1');
    $stmt->execute(['slug' => 'about']);
    $about = $stmt->fetch() ?: null;
} catch (Throwable $e) { $about = null; }
$content = $about && is_string($about['content'] ?? null) ? json_decode($about['content'], true) : [];
$content = is_array($content) ? $content : [];
$intro = $content['intro'] ?? null;
$paragraphs = $content['paragraphs'] ?? [];
$values = $content['values'] ?? [];
?>
<main class="page">
<section class="container page-intro"><p class="eyebrow">WebHub</p><h1><?= e($about['title'] ?? 'Raqamli mahsulotlarni puxta quramiz.') ?></h1><p class="lead"><?= e(is_string($intro) ? $intro : 'WebHub — biznes g‘oyalarini ishlaydigan, qulay va kengaytiriladigan raqamli mahsulotlarga aylantiradigan studiya.') ?></p></section>
<section class="container section-block about-layout">
<div class="about-copy">
<?php foreach (is_array($paragraphs) ? $paragraphs : [] as $paragraph): ?><?php if (is_string($paragraph)): ?><p><?= e($paragraph) ?></p><?php endif; ?><?php endforeach; ?>
</div>
<?php if (is_array($values) && $values): ?><div class="values-grid"><?php foreach ($values as $value): ?><?php if (is_array($value)): ?><article class="value-card"><span class="eyebrow"><?= e($value['label'] ?? '') ?></span><h2><?= e($value['title'] ?? '') ?></h2><p><?= e($value['description'] ?? '') ?></p></article><?php endif; ?><?php endforeach; ?></div><?php endif; ?>
</section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
