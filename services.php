<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Xizmatlar — WebHub';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>
<main class="page">
<section class="container page-intro"><p class="eyebrow">Xizmatlar</p><h1>Raqamli mahsulotingiz uchun kerak bo‘lgan tizim.</h1><p class="lead">Web-sayt, ichki platforma yoki to‘liq raqamli ekotizimni vazifaga mos arxitektura bilan quramiz.</p></section>
<section class="container section-block"><div id="services-grid" class="service-grid" aria-live="polite"><div class="loading-state">Xizmatlar yuklanmoqda…</div></div></section>
</main>
<script>
(async function(){const grid=document.getElementById('services-grid');try{const r=await fetch('/api/v1/services/index.php',{headers:{Accept:'application/json'}}),p=await r.json();if(!r.ok||!p.success)throw new Error();const items=p.data?.services||[];if(!items.length){grid.innerHTML='<div class="empty-state"><strong>Hozircha xizmatlar mavjud emas.</strong><span>Yangi xizmatlar qo‘shilganda shu yerda ko‘rinadi.</span></div>';return;}grid.innerHTML=items.map((item,i)=>{const tech=Array.isArray(item.technologies)?item.technologies:[];return `<article class="service-card"><div class="service-index">${String(i+1).padStart(2,'0')}</div><div class="service-icon" aria-hidden="true">${esc(item.icon||'•')}</div><h2>${esc(item.title||'')}</h2><p>${esc(item.short_description||item.description||'')}</p>${tech.length?`<div class="tag-list">${tech.map(t=>`<span>${esc(String(t))}</span>`).join('')}</div>`:''}</article>`}).join('')}catch(e){grid.innerHTML='<div class="empty-state"><strong>Xizmatlarni yuklab bo‘lmadi.</strong><span>Iltimos, birozdan so‘ng qayta urinib ko‘ring.</span></div>'}function esc(v){return v.replace(/[&<>\'\"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#039;','"':'&quot;'}[c]))}})();
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
