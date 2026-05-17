<?php
define('APP_NAME', 'ElectroHogar');
$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
define('BASE_URL', ($basePath === '' ? '' : $basePath) . '/');
define('ADMIN_EMAIL', 'admin@electrohogar.com');
define('ADMIN_PASSWORD', 'password123');
