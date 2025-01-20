<?php

$data = $_GET;

require_once base_path("Core/Database.php");

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$course = $database->query('SELECT instructor_id FROM course WHERE course_slug = :course_slug', [
    'course_slug' => $data['course-slug']
])->find();

if (!$course) {
    abort([], 404);
} else if (!owns($course['instructor_id'])) {
    abort([], 403);
}

$lesson = $database->query('SELECT * FROM lesson WHERE lesson_slug = :lesson_slug', [
    'lesson_slug' => $data['lesson-slug']
])->find();

view("lesson/index.php", ['lesson' => $lesson]);
