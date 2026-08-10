<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
api_method('GET');
require_permission('audit.read');
$stmt=db()->query('SELECT a.id,a.action,a.entity_type,a.entity_id,a.ip_address,a.created_at,u.name user_name,u.email user_email FROM audit_logs a LEFT JOIN users u ON u.id=a.user_id ORDER BY a.id DESC LIMIT 200');
json_response(true,['logs'=>$stmt->fetchAll()],'Audit log.');
