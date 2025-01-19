<?php


$router->get('/login', 'auth/login/login.php')->only('guest');
$router->post('/login', 'auth/login/create.php')->only('guest');
$router->get('/signup', 'auth/signup/signup.php')->only('guest');
$router->post('/signup', 'auth/signup/create.php')->only('guest');
$router->post('/logout', 'auth/logout.php')->only('auth');

$router->get('/', 'index.php')->only('guest');
$router->get('/home', 'home.php')->only('auth');

$router->get('/course/create', 'course/create.php')->only('auth');
$router->post('/course/create', 'course/store.php')->only('auth');
$router->get('/course/{course-slang}', 'course/detail.php')->only('auth');
$router->get('/course/{course-slang}/edit', 'course/edit.php')->only('auth');

$router->get('/course/{course-slang}/section/create', 'section/create.php')->only('auth');
$router->get('/course/{course-slang}/section/{section-slang}', 'section/index.php')->only('auth');

$router->get('/course/{course-slang}/section/{section-slang}/lesson/create', 'lesson/create.php')->only('auth');
$router->get('/course/{course-slang}/section/{section-slang}/lesson/{lesson-slang}', 'lesson/index.php')->only('auth');

$router->get('/course-slang-checker/{slang-name}', 'course/slang_checker.php');
