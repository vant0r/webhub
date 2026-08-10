<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Kirish — WebHub';
require_once __DIR__ . '/includes/header.php';
?>
<main class="auth-page">
    <section class="auth-card" aria-labelledby="login-title">
        <div class="auth-mark" aria-hidden="true">W</div>
        <p class="eyebrow">WEBHUB.UZ</p>
        <h1 id="login-title">Xush kelibsiz.</h1>
        <p class="auth-lead">Hisobingizga kiring va loyihalaringizni boshqaring.</p>

        <form id="login-form" class="auth-form" novalidate>
            <label class="field">
                <span>Email</span>
                <input id="email" name="email" type="email" autocomplete="email" inputmode="email" placeholder="siz@example.com" required>
            </label>
            <label class="field">
                <span>Parol</span>
                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Parolingiz" minlength="8" required>
            </label>
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <p id="form-message" class="form-message" role="alert" hidden></p>
            <button id="submit-button" class="button button-primary button-wide" type="submit">Kirish</button>
        </form>

        <p class="auth-switch">Hisobingiz yo‘qmi? <a href="/register.php">Ro‘yxatdan o‘ting</a></p>
    </section>
</main>
<script>
(() => {
    const form = document.getElementById('login-form');
    const button = document.getElementById('submit-button');
    const message = document.getElementById('form-message');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        if (!form.reportValidity()) return;
        button.disabled = true;
        button.textContent = 'Kirilmoqda…';
        message.hidden = true;

        try {
            const response = await fetch('/api/v1/auth/login.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            });
            const payload = await response.json();
            if (!response.ok || !payload.success) throw new Error(payload.message || 'Kirish amalga oshmadi.');
            window.location.href = '/user/';
        } catch (error) {
            message.textContent = error.message;
            message.hidden = false;
            button.disabled = false;
            button.textContent = 'Kirish';
        }
    });
})();
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
