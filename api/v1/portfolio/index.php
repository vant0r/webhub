<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('GET');
$stmt=db()->query("SELECT id,title,slug,short_description,description,cover_image,category,technologies,client_name,project_url,year,case_study,is_featured FROM portfolio WHERE status='published' ORDER BY is_featured DESC,year DESC,id DESC");
json_response(true,['portfolio'=>$stmt->fetchAll()],'Portfolio.');
