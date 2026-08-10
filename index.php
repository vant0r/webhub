<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle='WebHub — Raqamli mahsulotlar';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>
<main>
<section class="hero"><div class="container">
<p class="eyebrow">WEBHUB.UZ · DIGITAL STUDIO</p>
<h1>G‘oyangizni raqamli mahsulotga aylantiramiz.</h1>
<p class="hero-text">Web-saytlar, web-ilovalar va biznesingiz uchun yagona raqamli tizimlarni yaratamiz — sodda, tez va puxta.</p>
<div class="actions"><a class="button button-primary" href="/contact.php">Loyihani boshlash</a><a class="button button-secondary" href="/work.php">Ishlarimizni ko‘rish</a></div>
</div></section>
<section class="page"><div class="container"><div class="grid">
<article class="card"><p class="eyebrow">01</p><h2>Web</h2><p>Biznes va xizmatlar uchun tezkor, responsive va professional web mahsulotlar.</p></article>
<article class="card"><p class="eyebrow">02</p><h2>Tizimlar</h2><p>Admin panel, foydalanuvchi kabineti, loyiha boshqaruvi va API asosidagi platformalar.</p></article>
<article class="card"><p class="eyebrow">03</p><h2>Ekotizim</h2><p>Web, Android va desktop mijozlari uchun yagona backend va ma’lumotlar bazasi.</p></article>
</div></div></section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
