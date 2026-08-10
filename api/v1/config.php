<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

api_method('GET');

$flags = [];
$stmt = db()->query('SELECT `key`, value FROM feature_flags');
foreach ($stmt->fetchAll() as $row) $flags[$row['key']] = (bool) $row['value'];

$settings = [];
$stmt = db()->query('SELECT `key`, value FROM settings WHERE is_public = 1');
foreach ($stmt->fetchAll() as $row) {
    $decoded = json_decode($row['value'], true);
    $settings[$row['key']] = is_array($decoded) && array_key_exists('value', $decoded) ? $decoded['value'] : $decoded;
}

json_response(true, [
    'app' => ['name' => $settings['app.name'] ?? APP_NAME, 'version' => $settings['app.version'] ?? '1.0.0'],
    'features' => $flags,
    'branding' => ['logo' => $settings['branding.logo'] ?? '/assets/images/logo.svg', 'favicon' => $settings['branding.favicon'] ?? '/assets/images/favicon.svg'],
    'seo' => ['title' => $settings['seo.default_title'] ?? APP_NAME, 'description' => $settings['seo.default_description'] ?? ''],
    'maintenance' => $flags['maintenance_mode'] ?? false,
], 'OK');
