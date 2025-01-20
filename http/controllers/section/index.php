<?php

$sectionSlug = $_GET['section-slug'];
$courseSlug = $_GET['course-slug'];

require_once base_path("Core/Database.php");

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);



$section = $database->query('SELECT section.section_name as section_name, section.description as section_description, section.course_id as course_id, section.id as section_id FROM section WHERE section_slug = :section_slug', [
    'section_slug' => $sectionSlug
])->find();

$course = $database->query('SELECT instructor_id FROM course WHERE course_slug = :course_slug', [
    'course_slug' => $courseSlug
])->find();

$lessons = $database->query('SELECT lesson.name as lesson_name, lesson.lesson_slug as lesson_slug, lesson.description as lesson_description, lesson.section_id as section_id FROM lesson WHERE section_id = :section_id', [
    'section_id' => $section['section_id']
])->get();

if (!$section || !$course) {
    abort([], 404);
} else if (!owns($course['instructor_id'])) {
    abort([], 403);
}

view("section/index.view.php", ['sectionSlug' => $sectionSlug, 'courseSlug' => $courseSlug, 'lessons' => $lessons, 'section' => $section, 'course' => $course]);
