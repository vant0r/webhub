<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/functions.php';

require_method('GET');

$store = json_read(data_file('store'), []);

api_response(true, [
    'app' => [
        'name' => WEBHUB_NAME,
        'version' => WEBHUB_VERSION,
    ],
    'features' => [
        'chat' => true,
        'orders' => true,
        'notifications' => true,
        'file_upload' => false,
    ],
    'maintenance' => (bool) ($store['settings']['maintenance'] ?? false),
]);
