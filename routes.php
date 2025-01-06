<?php

$router->get('/', 'index.php')->only('guest');
$router->get('/login', 'auth/login.php')->only('guest');
$router->get('/signup', 'auth/signup.php')->only('guest');
$router->post('/signup', 'auth/create.php')->only('guest');
$router->get('/home', 'home.php')->only('auth');

$router->get('/course/create', 'course/create.php')->only('auth');
$router->get('/course/{course-slang}', 'course/detail.php')->only('auth');
$router->get('/course/{course-slang}/edit', 'course/edit.php')->only('auth');

$router->get('/course/{course-slang}/section/create', 'section/create.php')->only('auth');
$router->get('/course/{course-slang}/section/{section-slang}', 'section/index.php')->only('auth');

$router->get('/course/{course-slang}/section/{section-slang}/lesson/create', 'lesson/create.php')->only('auth');
$router->get('/course/{course-slang}/section/{section-slang}/lesson/{lesson-slang}', 'lesson/index.php')->only('auth');
