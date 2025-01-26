<?php
// Define the base path of the shared assets directory
define('SHARED_ASSETS_PATH', dirname(__DIR__, 1) . '/ewkethub_shared_assets');

// Get the requested file path
$requestUri = $_SERVER['REQUEST_URI'];

// Remove any query string parameters
$filePath = strtok($requestUri, '?');

// Ensure the requested path starts with /ewkethub_shared_assets
if (strpos($filePath, '/ewkethub_shared_assets') === 0) {
    // Construct the full file path
    $fullPath = SHARED_ASSETS_PATH . str_replace('/ewkethub_shared_assets', '', $filePath);

    // Check if the file exists and is a file
    if (file_exists($fullPath) && is_file($fullPath)) {
        // Determine the MIME type of the file
        $mimeType = mime_content_type($fullPath);

        // Serve the file with appropriate headers
        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($fullPath));

        // Read and output the file content
        readfile($fullPath);
        exit;
    } else {
        // If file not found, return a 404 response
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
        exit;
    }
}

// If the request is invalid, return a 403 response
header('HTTP/1.1 403 Forbidden');
echo '403 Forbidden';
exit;
