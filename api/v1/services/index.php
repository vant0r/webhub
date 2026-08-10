<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('GET');
$stmt=db()->query('SELECT id,title,slug,short_description,description,icon,image_url,technologies,sort_order,is_featured FROM services WHERE is_active=1 ORDER BY sort_order ASC,id ASC');
json_response(true,['services'=>$stmt->fetchAll()],'Xizmatlar.');
