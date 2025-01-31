<?php

$data = sanitise_form($_POST);

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
} else {
    $courseId = $course['id'];
    $result = $database->query('INSERT INTO section (section_name, section_slug, description, course_id) VALUES (:section_name, :section_slug, :description, :course_id)', [
        'section_name' => $data['title'],
        'section_slug' => $data['slug'],
        'description' => $data['description'],
        'course_id' => $courseId
    ]);

    if ($database->statement->rowCount() > 0) {
        Core\Session::set('message', [
            'type' => 'success',
            'content' => 'Section created successfully.'
        ]);
        redirect("/course/{$data['course-slug']}");
    } else {
        echo "Error inserting data into the database.";
    }
}
