<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
api_method('GET');
require_permission('users.read');
$stmt=db()->query('SELECT u.id,u.uuid,u.name,u.email,u.phone,u.status,u.last_login_at,u.last_seen_at,u.created_at,r.name role_name FROM users u JOIN roles r ON r.id=u.role_id ORDER BY u.id DESC LIMIT 200');
json_response(true,['users'=>$stmt->fetchAll()],'Foydalanuvchilar.');
