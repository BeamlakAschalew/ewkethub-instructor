<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Core\Database;

try {

    $errors = [];
    $data = sanitise_form($_POST);
    $config = require base_path("essentials/config.php");
    $database = new Database($config["database"]);

    $instructor = $database->query("SELECT * FROM instructor WHERE email = :email OR username = :username", [
        'email' => $data['emailUsername'],
        'username' => $data['emailUsername'],
    ])->find();

    if (!$instructor) {
        $errors['noUser'] = 'No user found with your username';
        view('auth/login/index.view.php', ['errors' => $errors]);
        die();
    }

    if ($instructor) {
        if (!password_verify($data['password'], $instructor['password'])) {
            $errors['incorrectPassword'] = 'Incorrect password';
            view('auth/login/index.view.php', ['errors' => $errors]);
            die();
        }
    }

    setcookie("instructor", json_encode($instructor), time() + (432000 * 30), "/");

    redirect('/home');
} catch (Exception $e) {
    abort(['error' => $e->getMessage()], 500);
}
