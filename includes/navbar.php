<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
?>
<header class="site-header">
    <div class="container nav">
        <a class="brand" href="/" aria-label="WebHub bosh sahifa">WEBHUB<span>.UZ</span></a>
        <nav aria-label="Asosiy navigatsiya">
            <a href="/work.php"<?= $currentPath === '/work.php' ? ' aria-current="page"' : '' ?>>Ishlar</a>
            <a href="/services.php"<?= $currentPath === '/services.php' ? ' aria-current="page"' : '' ?>>Xizmatlar</a>
            <a href="/about.php"<?= $currentPath === '/about.php' ? ' aria-current="page"' : '' ?>>Biz haqimizda</a>
            <a href="/contact.php"<?= $currentPath === '/contact.php' ? ' aria-current="page"' : '' ?>>Aloqa</a>
        </nav>
        <?php if (!empty($_SESSION['user_id'])): ?>
            <a class="button button-secondary" href="/user/">Kabinet</a>
        <?php else: ?>
            <a class="button button-primary" href="/login.php">Kirish</a>
        <?php endif; ?>
    </div>
</header>
