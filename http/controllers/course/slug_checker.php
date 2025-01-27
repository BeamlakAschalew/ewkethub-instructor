<?php

use Core\Database;

$data = $_GET['slug-name'];
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$course = $database->query("SELECT * FROM course WHERE course_slug = :slug", [
    'slug' => $data,
])->find();

$available = $course == false;

echo json_encode(['available' => $available]);
