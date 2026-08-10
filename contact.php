<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Aloqa — WebHub';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>
<main class="page">
<section class="container page-intro"><p class="eyebrow">Aloqa</p><h1>Loyihangiz haqida gaplashamiz.</h1><p class="lead">Vazifangizni yozing. So‘rov tizimga loyiha sifatida yuboriladi va keyingi bosqichni kabinet orqali davom ettirasiz.</p></section>
<section class="container section-block">
<form id="project-form" class="form card" novalidate>
<label for="title">Loyiha nomi</label><input id="title" name="title" required minlength="3" maxlength="200" autocomplete="off" placeholder="Masalan: kompaniya sayti">
<label for="description">Vazifa</label><textarea id="description" name="description" rows="6" maxlength="5000" placeholder="Nima yaratish kerakligini qisqacha yozing"></textarea>
<label for="budget">Taxminiy budjet</label><input id="budget" name="budget" type="number" min="0" step="0.01" inputmode="decimal" placeholder="Masalan: 5000000">
<label for="currency">Valyuta</label><select id="currency" name="currency"><option value="UZS">UZS — so‘m</option><option value="USD">USD — dollar</option><option value="EUR">EUR — yevro</option></select>
<button class="button button-primary" type="submit">So‘rov yuborish</button>
<p id="form-status" class="form-status" role="status" aria-live="polite"></p>
</form>
</section>
</main>
<script>
const form=document.getElementById('project-form'),status=document.getElementById('form-status');
form.addEventListener('submit',async e=>{e.preventDefault();status.textContent='Yuborilmoqda…';const body={title:form.title.value.trim(),description:form.description.value.trim(),budget:form.budget.value?Number(form.budget.value):null,currency:form.currency.value};if(body.title.length<3){status.textContent='Loyiha nomini kiriting.';return}try{const r=await fetch('/api/v1/projects/index.php',{method:'POST',headers:{'Content-Type':'application/json','Accept':'application/json'},body:JSON.stringify(body)}),p=await r.json();if(r.status===401){status.innerHTML='So‘rov yuborish uchun avval <a href="/login.php">hisobingizga kiring</a> yoki <a href="/register.php">ro‘yxatdan o‘ting</a>.';return}if(!r.ok||!p.success)throw new Error(p.message||'Xatolik');status.textContent='So‘rovingiz qabul qilindi. Loyiha kabinetingizda ko‘rinadi.';form.reset()}catch(err){status.textContent='So‘rovni yuborib bo‘lmadi. Iltimos, qayta urinib ko‘ring.'}});
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
