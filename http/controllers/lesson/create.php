<?php

$sectionSlug = $_GET['section-slug'];
$courseSlug = $_GET['course-slug'];

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$course = $database->query('SELECT instructor_id FROM course WHERE course_slug = :course_slug', [
    'course_slug' => $courseSlug
])->find();

if (!$course) {
    abort([], 404);
} else if (!owns($course['instructor_id'])) {
    abort([], 403);
}
view('lesson/create/index.view.php', ['sectionSlug' => $sectionSlug, 'courseSlug' => $courseSlug]);
