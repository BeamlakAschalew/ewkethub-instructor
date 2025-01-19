<?php

if (isset($_SESSION['instructor'])) {
    unset($_SESSION['instructor']);
}

if (isset($_COOKIE['instructor'])) {
    setcookie('instructor', '', time() - 3600, '/');
}

header("Location: /");
exit();
