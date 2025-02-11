<?php

use Core\Database;

try {

    $data = sanitise_form($_POST);

    $config = require base_path("essentials/config.php");
    $database = new Database($config["database"]);

    $course = $database->query('SELECT id, instructor_id FROM course WHERE course_slug = :course_slug', [
        'course_slug' => $data['course-slug']
    ])->find();

    $existingSection = $database->query('SELECT * FROM section WHERE section_slug = :section_slug AND course_id = :course_id', [
        'section_slug' => $data['section-slug'],
        'course_id' => $course['id']
    ])->find();


    if (!$course || !$existingSection) {
        abort([], 404);
    } else if (!owns($course['instructor_id'])) {
        abort([], 403);
    } else {
        $courseId = $course['id'];
        $result = $database->update('UPDATE section SET section_name = :section_name, section_slug = :section_slug, description = :description, course_id = :course_id WHERE course_id = :course_id AND section_slug = :section_slug', [
            'section_name' => $data['title'],
            'section_slug' => $data['slug'],
            'description' => $data['description'],
            'course_id' => $courseId,
            'section_slug' => $existingSection['section_slug']
        ]);

        if ($result) {
            Core\Session::set('message', [
                'type' => 'success',
                'content' => 'Section updated successfully.'
            ]);
            redirect("/course/{$data['course-slug']}/section/{$data['section-slug']}");
        } else {
            Core\Session::set('message', [
                'type' => 'error',
                'content' => 'Failed to updated section.'
            ]);
            redirect("/course/{$data['course-slug']}/section/{$data['section-slug']}");
        }
    }
} catch (Exception $e) {
    abort(['error' => $e->getMessage()], 500);
}
