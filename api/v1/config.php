<?php
declare(strict_types=1);
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') json_response(false, null, 'Method not allowed', 405);
json_response(true, ['app' => ['name' => APP_NAME, 'version' => '1.0.0'], 'features' => ['chat' => true, 'file_upload' => true, 'project_tracking' => true], 'maintenance' => false]);
