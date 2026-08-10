<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
api_method('GET');
require_permission('features.read');
$stmt=db()->query('SELECT `key`,value,updated_at FROM feature_flags ORDER BY `key` ASC');
json_response(true,['features'=>$stmt->fetchAll()],'Imkoniyatlar.');
