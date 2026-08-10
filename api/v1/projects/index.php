<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
$user = require_login();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = db()->prepare('SELECT p.id,p.uuid,p.title,p.description,p.budget,p.currency,p.priority,p.started_at,p.deadline_at,p.completed_at,p.created_at,p.updated_at,s.name status_name,s.slug status_slug,s.color status_color,sv.title service_title FROM projects p JOIN project_statuses s ON s.id=p.status_id LEFT JOIN services sv ON sv.id=p.service_id WHERE p.user_id=? ORDER BY p.updated_at DESC');
    $stmt->execute([(int)$user['id']]);
    json_response(true, ['projects'=>$stmt->fetchAll()], 'Loyihalar.');
}

api_method('POST');
$data=request_data();
$title=trim((string)($data['title']??''));
$description=trim((string)($data['description']??''));
$serviceId=isset($data['service_id'])?(int)$data['service_id']:null;
$budget=isset($data['budget'])?(float)$data['budget']:null;
$currency=strtoupper(trim((string)($data['currency']??'USD')));
if(mb_strlen($title)<3||mb_strlen($title)>200) json_response(false,null,'Loyiha nomi noto‘g‘ri.',422);
$status=db()->query("SELECT id FROM project_statuses WHERE slug='new' LIMIT 1")->fetch();
$uuid=bin2hex(random_bytes(16));
$stmt=db()->prepare('INSERT INTO projects(uuid,user_id,title,description,service_id,status_id,budget,currency) VALUES(?,?,?,?,?,?,?,?)');
$stmt->execute([$uuid,$user['id'],$title,$description,$serviceId,$status['id'],$budget,$currency]);
json_response(true,['project_id'=>(int)db()->lastInsertId(),'uuid'=>$uuid],'Loyiha yaratildi.',201);
