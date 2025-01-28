<?php

use Core\Database;

$courseSlug = $_GET['course-slug'];
$sectionSlug = $_GET['section-slug'];
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$lessonSlug = $_GET['lesson-slug'];

$lessonCount = $database->query("SELECT COUNT(*) as count FROM lesson l
    JOIN section s ON l.section_id = s.id
    JOIN course c ON s.course_id = c.id
    WHERE l.lesson_slug = :lesson_slug AND s.section_slug = :section_slug AND c.course_slug = :course_slug", [
    'lesson_slug' => $lessonSlug,
    'section_slug' => $sectionSlug,
    'course_slug' => $courseSlug
])->find();

if ($lessonCount['count'] > 0) {
    echo json_encode(['available' => false, 'message' => 'Duplicate lesson slugs found in the same section.']);
} else {
    echo json_encode(['available' => true]);
}
