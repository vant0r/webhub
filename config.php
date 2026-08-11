<?php

declare(strict_types=1);

const WEBHUB_NAME = 'WebHub';
const WEBHUB_VERSION = '0.1.0';
const WEBHUB_DATA_DIR = __DIR__ . '/data';
const WEBHUB_STORAGE_DIR = __DIR__ . '/storage';
const WEBHUB_SESSION_NAME = 'webhub_session';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name(WEBHUB_SESSION_NAME);
    session_set_cookie_params([
        'httponly' => true,
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'samesite' => 'Lax',
        'path' => '/',
    ]);
    session_start();
}

foreach ([WEBHUB_DATA_DIR, WEBHUB_STORAGE_DIR] as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0750, true);
    }
}
