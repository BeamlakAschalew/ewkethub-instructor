<?php

use Core\Database;

try {

    $sectionSlug = $_GET['section-slug'];
    $courseSlug = $_GET['course-slug'];

    $config = require base_path("essentials/config.php");
    $database = new Database($config["database"]);


    $course = $database->query('SELECT instructor_id, id FROM course WHERE course_slug = :course_slug', [
        'course_slug' => $courseSlug
    ])->find();

    $section = $database->query('SELECT section.section_name as section_name, section.section_slug AS section_slug, section.description as section_description, section.course_id as course_id, section.id as section_id FROM section JOIN course ON course.id = section.course_id WHERE section_slug = :section_slug AND section.course_id = :course_id', [
        'section_slug' => $sectionSlug,
        'course_id' => $course['id']
    ])->find();

    if (!$section || !$course) {
        abort([], 404);
    } else if (!owns($course['instructor_id'])) {
        abort([], 403);
    }

    view("section/edit/index.view.php", ['sectionSlug' => $sectionSlug, 'courseSlug' => $courseSlug, 'section' => $section, 'course' => $course]);
} catch (Exception $e) {
    abort(['error' => $e->getMessage()], 500);
}
