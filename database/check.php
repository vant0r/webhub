<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/../includes/functions.php';

try {
    db()->query('SELECT 1');
} catch (Throwable $e) {
    http_response_code(500);
    exit('Database connection failed. Configure WEBHUB_DB_HOST, WEBHUB_DB_NAME, WEBHUB_DB_USER and WEBHUB_DB_PASS.');
}
