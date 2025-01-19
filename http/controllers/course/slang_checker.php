<?php

require_once base_path("Core/Database.php");

use Core\Database;

$data = $_GET['slang-name'];
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$course = $database->query("SELECT * FROM course WHERE course_slug = :slug", [
    'slug' => $data,
])->find();

$available = $course == false;

echo json_encode(['available' => $available]);
