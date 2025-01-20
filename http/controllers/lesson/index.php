<?php

$data = $_GET;

require_once base_path("Core/Database.php");

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$lesson = $database->query('SELECT * FROM lesson WHERE lesson_slug = :lesson_slug', [
    'lesson_slug' => $data['lesson-slug']
])->find();

view("lesson/index.php", ['lesson' => $lesson]);
