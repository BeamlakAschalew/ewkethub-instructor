<?php

require_once base_path("Core/Database.php");

use Core\Database;

$courseSlug = $_GET['course-slug'];
$sectionSlug = $_GET['section-slug'];
$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$course = $database->query("SELECT * FROM course WHERE course_slug = :slug", [
    'slug' => $courseSlug,
])->find();

if (!$course) {
    echo json_encode(['available' => true]);
    die();
} else {
    $section = $database->query("SELECT * FROM section WHERE course_id = :course_id AND section_slug = :section_slug", [
        'course_id' => $course['id'],
        'section_slug' => $sectionSlug
    ])->get();

    $available = $section == false;
    echo json_encode(['available' => $available]);
}
