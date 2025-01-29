<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Core\Database;

$errors = [];
$targetDir = "../../ewkethub_shared_assets/images/instructors/profile_images/";
$data = sanitise_form($_POST);
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$instructor = $database->query("SELECT * FROM instructor WHERE email = :email OR username = :username", [
    'email' => $_POST['email'],
    'username' => $_POST['username'],
])->find();

if ($instructor) {
    $errors['exists'] = 'Username or email is taken';
    view('auth/signup/index.view.php', ['errors' => $errors]);
    die();
}

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$file = $_FILES['profileImage'];
$fileName = null;
if (isset($file) && $file['error'] === 0) {
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = time() . '.' . $fileExtension;
    $fileTmpPath = $file['tmp_name'];
    $fileType = $file['type'];
    $targetFilePath = $targetDir . $fileName;

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            echo "File uploaded successfully: " . $targetFilePath;
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Invalid file type. Please upload an image (JPEG, PNG, or GIF).";
    }
} else {
    echo "Error uploading the file. Error code: " . $file['error'];
}

$database->query(
    "INSERT INTO instructor (full_name, username, email, password, profile_picture_path, bio) VALUES (:full_name, :username, :email, :password, :profile_picture_path, :bio)",
    [
        'full_name' => $data['fullName'],
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_BCRYPT),
        'profile_picture_path' => $fileName,
        'bio' => $data['bio']
    ]
)->find();

$instructorId = $database->connection->lastInsertId();

$instructorFind = $database->query(
    "SELECT * FROM instructor WHERE id = :id",
    ['id' => $instructorId]
)->find();

setcookie("instructor", json_encode($instructorFind), time() + (432000 * 30), "/");

header("Location: /home");
