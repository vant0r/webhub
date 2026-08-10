<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Ishlarimiz — WebHub';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>
<main class="page">
<section class="container page-intro"><p class="eyebrow">Portfolio</p><h1>Biz yaratgan raqamli mahsulotlar.</h1><p class="lead">Faqat bazada mavjud va e’lon qilingan loyihalar shu yerda ko‘rsatiladi.</p></section>
<section class="container section-block"><div id="portfolio-grid" class="portfolio-grid" aria-live="polite"><div class="loading-state">Ishlar yuklanmoqda…</div></div></section>
</main>
<script>
(async function(){const grid=document.getElementById('portfolio-grid');try{const r=await fetch('/api/v1/portfolio/index.php',{headers:{Accept:'application/json'}}),p=await r.json();if(!r.ok||!p.success)throw new Error();const items=p.data?.portfolio||[];if(!items.length){grid.innerHTML='<div class="empty-state"><strong>Hozircha e’lon qilingan loyiha yo‘q.</strong><span>Yangi loyihalar qo‘shilganda shu yerda ko‘rinadi.</span></div>';return;}grid.innerHTML=items.map(item=>{const tech=Array.isArray(item.technologies)?item.technologies:[];const image=item.cover_image?`<img src="${esc(item.cover_image)}" alt="${esc(item.title||'Loyiha')}" loading="lazy">`:'';const link=item.slug?`<a class="portfolio-link" href="/project.php?slug=${encodeURIComponent(item.slug)}">Batafsil <span aria-hidden="true">↗</span></a>`:'';return `<article class="portfolio-card">${image?`<div class="portfolio-media">${image}</div>`:''}<div class="portfolio-body"><div class="portfolio-meta"><span>${esc(item.category||'Loyiha')}</span>${item.year?`<span>${esc(String(item.year))}</span>`:''}</div><h2>${esc(item.title||'')}</h2><p>${esc(item.short_description||item.description||'')}</p>${tech.length?`<div class="tag-list">${tech.map(t=>`<span>${esc(String(t))}</span>`).join('')}</div>`:''}${link}</div></article>`}).join('')}catch(e){grid.innerHTML='<div class="empty-state"><strong>Ishlarni yuklab bo‘lmadi.</strong><span>Iltimos, birozdan so‘ng qayta urinib ko‘ring.</span></div>'}function esc(v){return v.replace(/[&<>\'\"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#039;','"':'&quot;'}[c]))}})();
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
