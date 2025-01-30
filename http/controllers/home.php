<?php

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);

$instructor = $_SESSION['instructor'];

$courses = $database->query('SELECT course.id AS course_id, course.name AS course_name, course.description AS course_description, course.course_thumbnail_path AS course_thumbnail, instructor.full_name AS course_instructor, course.price AS price, category.name AS course_category, course.course_slug AS course_slug FROM course JOIN instructor ON course.instructor_id = instructor.id JOIN category ON course.category_id = category.id WHERE instructor_id = :instructor_id', [
    'instructor_id' => $instructor['id']
])->get();

$totalStudents = 0;
foreach ($courses as $course) {
    $totalStudents += $database->query('SELECT COUNT(*) as total_students FROM student_course WHERE course_id = :course_id', [
        'course_id' => $course['course_id']
    ])->find()['total_students'];
}

view("home/index.view.php", ['courses' => $courses, 'instructor' => $instructor, 'totalStudents' => $totalStudents]);
