<?php

use Core\Database;

$targetDir = "../../ewkethub_shared_assets/images/course_thumbnails/";
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$data = $_POST;

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$file = $_FILES['courseImage'];
$fileName = null;
if (isset($file) && $file['error'] === 0) {
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
    echo "Error uploading the file. Error code: " . $file['error'];
}

$instructorId = $_SESSION['instructor']['id'];

$result = $database->query('INSERT INTO course (name, course_slug, description, category_id, difficulty, price, course_thumbnail_path, instructor_id) VALUES (:name, :course_slug, :description, :category_id, :difficulty, :price, :course_thumbnail_path, :instructor_id)', [
    'name' => $data['title'],
    'course_slug' => $data['slug'],
    'description' => $data['description'],
    'category_id' => $data['category'],
    'difficulty' => $data['difficulty'],
    'price' => $data['price'],
    'course_thumbnail_path' => $fileName,
    'instructor_id' => $instructorId
]);

if ($database->statement->rowCount() > 0) {
    header("Location: /home");
    exit();
} else {
    echo "Error inserting data into the database.";
}
