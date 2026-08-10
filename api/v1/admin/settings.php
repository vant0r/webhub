<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
api_method('GET');
require_permission('settings.read');
$stmt=db()->query('SELECT `key`,value,is_public,updated_at FROM settings ORDER BY `key` ASC');
$settings=$stmt->fetchAll();
foreach($settings as &$row){$decoded=json_decode((string)$row['value'],true);if($decoded!==null)$row['value']=$decoded;}
unset($row);
json_response(true,['settings'=>$settings],'Sozlamalar.');
