<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
api_method('GET');
require_permission('projects.read');
$stmt=db()->query('SELECT p.id,p.uuid,p.title,p.budget,p.currency,p.priority,p.deadline_at,p.created_at,p.updated_at,u.name user_name,u.email user_email,s.name status_name,s.slug status_slug,s.color status_color FROM projects p JOIN users u ON u.id=p.user_id JOIN project_statuses s ON s.id=p.status_id ORDER BY p.updated_at DESC LIMIT 200');
json_response(true,['projects'=>$stmt->fetchAll()],'Barcha loyihalar.');
