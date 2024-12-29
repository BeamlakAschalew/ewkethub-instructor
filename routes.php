<?php

$router->get('/', 'index.php');
$router->get('/login', 'auth/login.php');
$router->get('/signup', 'auth/signup.php');
$router->get('/home', 'home.php');
$router->get('/course/create', 'course/create.php');

$router->get('/course/{course-slang}/detail', 'course/detail.php');
$router->get('/course/{course-slang}/edit', 'course/edit.php');
$router->get('/course/{course-slang}/section/create', 'section/create.php');

$router->get('/course/{course-slang}/section/{section-slang}', 'section/index.php');
