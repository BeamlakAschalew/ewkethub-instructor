<?php

try {
    if (isset($_SESSION['instructor'])) {
        unset($_SESSION['instructor']);
    }

    if (isset($_COOKIE['instructor'])) {
        setcookie('instructor', '', time() - 3600, '/');
    }

    redirect('/');
} catch (Exception $e) {
    abort(['error' => $e->getMessage()], 500);
}
