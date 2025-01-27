<?php

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$categories = $database->query("SELECT * FROM category")->get();
$difficulties = $database->query("SELECT * FROM course_difficulty")->get();

view("course/create/index.view.php", ['categories' => $categories, 'difficulties' => $difficulties]);
