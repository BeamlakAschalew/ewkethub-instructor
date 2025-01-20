<?php
header('Content-Type: application/json');

function logMessage($message) {
    error_log($message, 3, '/opt/lampp/logs/custom_log.log');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = '../uploads/videos/lesson_videos/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
        logMessage("Created upload directory: $uploadDir\n");
    }

    if (isset($_FILES['file'])) {
        logMessage("File found: $uploadDir\n");
        $file = $_FILES['file'];
        $fileName = basename($file['name']);
        $fileName = time() . $fileName;
        $targetFilePath = $uploadDir . $fileName;

        logMessage("Attempting to upload file: $fileName\n");

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            logMessage("File uploaded successfully: $fileName\n");
            echo json_encode(['success' => true, 'fileName' => $fileName]);
        } else {
            logMessage("Failed to move uploaded file: $fileName\n");
            echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']);
        }
    } else {
        logMessage("No file uploaded.\n");
        echo json_encode(['success' => false, 'message' => 'No file uploaded.']);
    }
} else {
    logMessage("Invalid request method.\n");
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
