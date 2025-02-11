<?php

use Core\Database;

try {

    $data = sanitise_form($_POST);

    $config = require base_path("essentials/config.php");
    $database = new Database($config["database"]);

    $course = $database->query('SELECT id, instructor_id FROM course WHERE course_slug = :course_slug', [
        'course_slug' => $data['course-slug']
    ])->find();

    $section = $database->query('SELECT * FROM section WHERE section_slug = :section_slug AND course_id = :course_id', [
        'section_slug' => $data['section-slug'],
        'course_id' => $course['id']
    ])->find();


    if (!$course || !$section) {
        abort([], 404);
    } else if (!owns($course['instructor_id'])) {
        abort([], 403);
    } else {
        $courseId = $course['id'];
        $result = $database->delete('DELETE FROM section WHERE course_id = :course_id AND section_slug = :section_slug', [
            'course_id' => $courseId,
            'section_slug' => $section['section_slug']
        ]);

        if ($result) {
            Core\Session::set('message', [
                'type' => 'success',
                'content' => 'Section deleted successfully.'
            ]);
            redirect("/course/{$data['course-slug']}");
        } else {
            Core\Session::set('message', [
                'type' => 'error',
                'content' => 'Failed to delete section.'
            ]);
            redirect("/course/{$data['course-slug']}/section/{$data['section-slug']}");
        }
    }
} catch (Exception $e) {
    abort(['error' => $e->getMessage()], 500);
}
