<?php

use Core\Database;

try {

    $config = require base_path("essentials/config.php");
    $database = new Database($config["database"]);

    $courseSlug = $_GET['course-slug'];

    $course = $database->query('SELECT course.name as course_name, course.description as course_description, course.course_thumbnail_path as course_thumbnail, instructor.full_name as course_instructor, course.price as price, category.name as course_category, course.course_slug as course_slug, course_difficulty.name as difficulty, course.id as id, instructor.id as instructor_id FROM course JOIN instructor ON course.instructor_id = instructor.id JOIN category ON course.category_id = category.id JOIN course_difficulty ON course.difficulty = course_difficulty.id WHERE course_slug = :course_slug', [
        'course_slug' => $courseSlug
    ])->find();

    if (!$course) {
        abort([], 404);
    } else if (!owns($course['instructor_id'])) {
        abort([], 403);
    }

    $sections = $database->query('SELECT * FROM section WHERE course_id = :course_id ORDER BY created_at', [
        'course_id' => $course['id']
    ])->get();

    view("course/index.view.php", ['course' => $course, 'sections' => $sections]);
} catch (Exception $e) {
    abort(['error' => $e->getMessage()], 500);
}
