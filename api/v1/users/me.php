<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('GET');
$user = require_login();
unset($user['password_hash'], $user['permissions']);
json_response(true, ['user' => $user], 'Profil ma’lumotlari.');
