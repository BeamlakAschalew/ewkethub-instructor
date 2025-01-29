<?php

$data = sanitise_form($_POST);

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$section = $database->query('SELECT id FROM section WHERE section_slug = :section_slug', [
    'section_slug' => $data['section-slug']
])->find();

$course = $database->query('SELECT id, instructor_id FROM course WHERE course_slug = :course_slug', [
    'course_slug' => $data['course-slug']
])->find();

if (!$section) {
    abort([], 404);
} else if (!owns($course['instructor_id'])) {
    abort([], 403);
}

$result = $database->query('INSERT INTO lesson (name, lesson_slug, description, section_id, video_file_path) VALUES (:lesson_name, :lesson_slug, :description, :section_id, :file_name)', [
    'lesson_name' => $data['title'],
    'lesson_slug' => $data['slug'],
    'description' => $data['description'],
    'section_id' => $section['id'],
    'file_name' => $data['uploaded_video']
]);

if ($database->statement->rowCount() > 0) {
    header("Location: /course/{$data['course-slug']}/section/{$data['section-slug']}/lesson/{$data['slug']}");
    exit();
} else {
    echo "Error inserting data into the database.";
}
