<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('POST');
logout_user();
json_response(true, null, 'Tizimdan chiqildi.');
