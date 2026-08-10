<?php
declare(strict_types=1);

const APP_NAME = 'WebHub';
const APP_URL = 'https://webhub.uz';
const APP_LANG = 'uz';
const APP_TIMEZONE = 'Asia/Tashkent';

date_default_timezone_set(APP_TIMEZONE);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'httponly' => true,
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'samesite' => 'Lax',
    ]);
    session_start();
}
