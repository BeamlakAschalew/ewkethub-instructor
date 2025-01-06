<?php

namespace Core\Middleware;

class Authenticated {
    public function handle() {
        if (! $_SESSION['instructor'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
