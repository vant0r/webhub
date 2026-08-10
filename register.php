<?php
declare(strict_types=1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Ro‘yxatdan o‘tish — WebHub';
require_once __DIR__ . '/includes/header.php';
?>
<main class="auth-page">
    <section class="auth-card auth-card-wide" aria-labelledby="register-title">
        <div class="auth-mark" aria-hidden="true">W</div>
        <p class="eyebrow">WEBHUB.UZ</p>
        <h1 id="register-title">Hisobingizni yarating.</h1>
        <p class="auth-lead">Loyihangizni WebHub orqali boshqarish uchun bir necha soniya kifoya.</p>

        <form id="register-form" class="auth-form" novalidate>
            <label class="field">
                <span>Ism va familiya</span>
                <input id="name" name="name" type="text" autocomplete="name" placeholder="Ism va familiyangiz" minlength="2" maxlength="120" required>
            </label>
            <label class="field">
                <span>Email</span>
                <input id="email" name="email" type="email" autocomplete="email" inputmode="email" placeholder="siz@example.com" required>
            </label>
            <label class="field">
                <span>Parol</span>
                <input id="password" name="password" type="password" autocomplete="new-password" placeholder="Kamida 8 belgi" minlength="8" required>
            </label>
            <label class="field">
                <span>Parolni tasdiqlang</span>
                <input id="password-confirm" name="password_confirm" type="password" autocomplete="new-password" placeholder="Parolni qayta kiriting" minlength="8" required>
            </label>
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <p id="form-message" class="form-message" role="alert" hidden></p>
            <button id="submit-button" class="button button-primary button-wide" type="submit">Hisob yaratish</button>
        </form>

        <p class="auth-switch">Hisobingiz bormi? <a href="/login.php">Kirish</a></p>
    </section>
</main>
<script>
(() => {
    const form = document.getElementById('register-form');
    const password = document.getElementById('password');
    const confirmation = document.getElementById('password-confirm');
    const button = document.getElementById('submit-button');
    const message = document.getElementById('form-message');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        confirmation.setCustomValidity(password.value === confirmation.value ? '' : 'Parollar mos kelmaydi.');
        if (!form.reportValidity()) return;
        button.disabled = true;
        button.textContent = 'Yaratilmoqda…';
        message.hidden = true;

        try {
            const response = await fetch('/api/v1/auth/register.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            });
            const payload = await response.json();
            if (!response.ok || !payload.success) throw new Error(payload.message || 'Hisob yaratilmadi.');
            window.location.href = '/user/';
        } catch (error) {
            message.textContent = error.message;
            message.hidden = false;
            button.disabled = false;
            button.textContent = 'Hisob yaratish';
        }
    });

    confirmation.addEventListener('input', () => {
        confirmation.setCustomValidity(password.value === confirmation.value ? '' : 'Parollar mos kelmaydi.');
    });
})();
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
