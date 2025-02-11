<?php
define('SHARED_ASSETS_PATH', dirname(__DIR__, 1) . '/ewkethub_shared_assets');

$requestUri = $_SERVER['REQUEST_URI'];

$filePath = strtok($requestUri, '?');

if (strpos($filePath, '/ewkethub_shared_assets') === 0) {
    $fullPath = SHARED_ASSETS_PATH . str_replace('/ewkethub_shared_assets', '', $filePath);

    if (file_exists($fullPath) && is_file($fullPath)) {
        $mimeType = mime_content_type($fullPath);

        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($fullPath));

        readfile($fullPath);
        exit;
    } else {
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
        exit;
    }
}

header('HTTP/1.1 403 Forbidden');
echo '403 Forbidden';
exit;
