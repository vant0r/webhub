<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
$user = require_login();
if (!is_admin($user)) json_response(false, null, 'Admin ruxsati talab qilinadi.', 403);
