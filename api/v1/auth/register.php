<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('POST');

$data = request_data();
$name = trim((string)($data['name'] ?? ''));
$email = strtolower(trim((string)($data['email'] ?? '')));
$password = (string)($data['password'] ?? '');

if (mb_strlen($name) < 2 || mb_strlen($name) > 120) json_response(false, null, 'Ism noto‘g‘ri.', 422);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) json_response(false, null, 'Email noto‘g‘ri.', 422);
if (strlen($password) < 8) json_response(false, null, 'Parol kamida 8 belgidan iborat bo‘lishi kerak.', 422);

$role = db()->query("SELECT id FROM roles WHERE name = 'USER' LIMIT 1")->fetch();
if (!$role) json_response(false, null, 'USER roli topilmadi.', 500);

$check = db()->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
$check->execute([$email]);
if ($check->fetch()) json_response(false, null, 'Bu email allaqachon ro‘yxatdan o‘tgan.', 409);

$uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', random_int(0,65535), random_int(0,65535), random_int(0,65535), random_int(16384,20479), random_int(32768,49151), random_int(0,65535), random_int(0,65535), random_int(0,65535));
$hash = password_hash($password, defined('PASSWORD_ARGON2ID') ? PASSWORD_ARGON2ID : PASSWORD_DEFAULT);
$stmt = db()->prepare('INSERT INTO users (uuid,name,email,password_hash,role_id,status) VALUES (?,?,?,?,?,?)');
$stmt->execute([$uuid,$name,$email,$hash,$role['id'],'active']);

login_user((int)db()->lastInsertId());
json_response(true, ['user' => ['id' => (int)db()->lastInsertId(), 'name' => $name, 'email' => $email]], 'Ro‘yxatdan o‘tish muvaffaqiyatli.');
