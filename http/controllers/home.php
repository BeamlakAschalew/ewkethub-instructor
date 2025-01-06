<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$instructor = $_SESSION['instructor'];

view("home/index.view.php", ['courses' => [
    ['title' => 'Course 1', 'description' => 'Description 1'],
    ['title' => 'Course 2', 'description' => 'Description 2'],
], 'instructor' => $instructor]);
