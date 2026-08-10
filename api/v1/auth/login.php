<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('POST');

$data = request_data();
$email = strtolower(trim((string)($data['email'] ?? '')));
$password = (string)($data['password'] ?? '');
$csrf = (string)($data['csrf'] ?? '');

if (!verify_csrf($csrf)) json_response(false, null, 'Sessiya xavfsizlik belgisi noto‘g‘ri. Sahifani yangilang.', 419);
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') json_response(false, null, 'Email yoki parol noto‘g‘ri.', 422);

$stmt = db()->prepare('SELECT u.*, r.name AS role_name, r.permissions FROM users u JOIN roles r ON r.id=u.role_id WHERE u.email=? AND u.status=? LIMIT 1');
$stmt->execute([$email, 'active']);
$user = $stmt->fetch();
if (!$user || !password_verify($password, $user['password_hash'])) json_response(false, null, 'Email yoki parol noto‘g‘ri.', 401);

login_user((int) $user['id']);
unset($user['password_hash'], $user['permissions']);
json_response(true, ['user' => $user], 'Tizimga muvaffaqiyatli kirildi.');
