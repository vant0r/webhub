<?php
declare(strict_types=1);

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'WebHub — Raqamli mahsulotlar';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>
<main>
    <section class="hero">
        <div class="container">
            <p class="eyebrow">WEBHUB.UZ</p>
            <h1>Raqamli mahsulotlarni yaratamiz.</h1>
            <p class="hero-text">Web-saytlar, web-ilovalar va raqamli tizimlarni zamonaviy texnologiyalar bilan ishlab chiqamiz.</p>
            <div class="actions">
                <a class="button button-primary" href="/contact.php">Loyihani boshlash</a>
                <a class="button button-secondary" href="/work.php">Ishlarimizni ko‘rish</a>
            </div>
        </div>
    </section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
