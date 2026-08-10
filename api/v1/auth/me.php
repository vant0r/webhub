<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('GET');
$user = current_user();
if (!$user) json_response(false, null, 'Tizimga kirilmagan.', 401);
unset($user['password_hash'], $user['permissions']);
json_response(true, ['user' => $user], 'OK');
