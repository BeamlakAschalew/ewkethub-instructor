<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = '../uploads/videos/lesson_videos/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = time() . '.' . $fileExtension;
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['mp4', 'mkv', 'mov'];

        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            echo json_encode(['success' => false, 'message' => 'Invalid file type. Only MP4, MKV, and MOV are allowed.']);
            exit;
        }
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo json_encode(['success' => true, 'fileName' => $fileName]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No file uploaded.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
