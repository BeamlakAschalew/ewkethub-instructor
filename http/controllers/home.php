<?php

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$instructor = $_SESSION['instructor'];

$courses = $database->query('SELECT course.name as course_name, course.description as course_description, course.course_thumbnail_path as course_thumbnail, instructor.full_name as course_instructor, course.price as price, category.name as course_category, course.course_slug as course_slug FROM course JOIN instructor ON course.instructor_id = instructor.id JOIN category ON course.category_id = category.id WHERE instructor_id = :instructor_id', [
    'instructor_id' => $instructor['id']
])->get();


view("home/index.view.php", ['courses' => $courses, 'instructor' => $instructor]);
