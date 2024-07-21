<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ($uri !== '/' && file_exists(__DIR__ . '/todo/public' . $uri)) {
    return false;
}
require_once __DIR__ . '/todo/public/index.php';
//
