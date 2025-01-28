<?php

$data = $_GET;

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$course = $database->query('SELECT id, instructor_id FROM course WHERE course_slug = :course_slug', [
    'course_slug' => $data['course-slug']
])->find();

if (!$course) {
    abort([], 404);
} else if (!owns($course['instructor_id'])) {
    abort([], 403);
}

$section = $database->query('SELECT section.id as section_id FROM section JOIN course ON course.id = section.course_id WHERE section_slug = :section_slug AND section.course_id = :course_id', [
    'section_slug' => $data['section-slug'],
    'course_id' => $course['id']
])->find();

$lesson = $database->query('SELECT * FROM lesson WHERE lesson_slug = :lesson_slug AND section_id = :section_id', [
    'lesson_slug' => $data['lesson-slug'],
    'section_id' => $section['section_id']
])->find();

view("lesson/index.php", ['lesson' => $lesson]);
