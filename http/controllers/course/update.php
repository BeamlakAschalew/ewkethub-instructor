<?php

use Core\Database;

$targetDir = "../../ewkethub_shared_assets/images/course_thumbnails/";
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$data = sanitise_form($_POST);


if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$existingCourse = $database->query('SELECT course_thumbnail_path FROM course WHERE course_slug = :course_slug', [
    'course_slug' => $data['course-slug']
])->find();

$existingFileName = $existingCourse['course_thumbnail_path'];

$file = $_FILES['courseImage'];
$fileName = $existingFileName;
$fileUploaded = false;

if (isset($file) && !empty($file['name']) && $file['error'] === 0) {
    $fileUploaded = true;
    $fileName = basename($file['name']);
    $fileName = time() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
    $fileTmpPath = $file['tmp_name'];
    $fileType = $file['type'];
    $targetFilePath = $targetDir . $fileName;

    $allowedTypes = ['image/jpeg', 'image/png'];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            echo "File uploaded successfully: " . $targetFilePath;
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Invalid file type. Please upload an image (JPEG or PNG).";
    }
} else {
    $fileUploaded = false;
}

$instructorId = $_SESSION['instructor']['id'];

$result = $database->update('UPDATE course SET name = :name, course_slug = :course_slug, description = :description, category_id = :category_id, difficulty = :difficulty, price = :price, instructor_id = :instructor_id, course_thumbnail_path = :course_thumbnail_path WHERE course_slug = :existing_course_slug', [
    'name' => $data['title'],
    'course_slug' => $data['slug'],
    'description' => $data['description'],
    'category_id' => $data['category'],
    'difficulty' => $data['difficulty'],
    'price' => $data['price'],
    'course_thumbnail_path' => $fileName,
    'instructor_id' => $instructorId,
    'existing_course_slug' => $data['course-slug']
]);

if ($result) {
    header("Location: /course/{$data['slug']}");
    exit();
} else {
    abort(['error' => "Error updating data in the database."], 500);
    exit();
}
