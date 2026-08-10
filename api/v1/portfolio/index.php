<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('GET');
$stmt=db()->query("SELECT id,title,slug,short_description,description,cover_image,category,technologies,client_name,project_url,year,case_study,is_featured FROM portfolio WHERE status='published' ORDER BY is_featured DESC,year DESC,id DESC");
$items=$stmt->fetchAll();
foreach($items as &$item){foreach(['technologies','case_study'] as $field){if(isset($item[$field])&&is_string($item[$field])){$decoded=json_decode($item[$field],true);if($decoded!==null)$item[$field]=$decoded;}}}
unset($item);
json_response(true,['portfolio'=>$items],'Portfolio.');
