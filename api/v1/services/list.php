<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/functions.php';

require_method('GET');

$store = json_read(data_file('store'), []);
$services = array_values(array_filter($store['services'] ?? [], static fn($item) => ($item['is_active'] ?? false) === true));

api_response(true, $services, 'Xizmatlar muvaffaqiyatli olindi.');
