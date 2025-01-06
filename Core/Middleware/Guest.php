<?php

namespace Core\Middleware;

class Guest {
    public function handle() {
        if ($_SESSION['instructor'] ?? false) {
            header('location: /home');
            exit();
        }
    }
}
