<?php

namespace Core\Middleware;

class Owns {
    public function handle() {
        if (! $_SESSION['instructor'] ?? false) {
            header('location: /');
            exit();
        }

        $courseId = $_GET['course_id'] ?? null;
        if (!$courseId || $_SESSION['instructor']['id'] != $courseId) {
            // Retrieve the course and check if it belongs to $_SESSION['instructor']['id']
            // If ownership fails, abort([], 403);
            abort([], 403);
        }
    }
}
