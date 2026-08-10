<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('GET');
$user=require_login();
$stmt=db()->prepare('SELECT id,type,title,body,payload,read_at,created_at FROM notifications WHERE user_id=? ORDER BY id DESC LIMIT 50');
$stmt->execute([$user['id']]);
json_response(true,['notifications'=>$stmt->fetchAll()],'Bildirishnomalar.');
