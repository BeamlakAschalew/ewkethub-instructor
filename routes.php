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
$router->get('/course/{course-slug}', 'course/detail.php')->only('auth');
$router->get('/course/{course-slug}/edit', 'course/edit.php')->only('auth');

$router->get('/course/{course-slug}/section/create', 'section/create.php')->only('auth');
$router->post('/course/{course-slug}/section/create', 'section/store.php')->only('auth');
$router->get('/course/{course-slug}/section/{section-slug}', 'section/index.php')->only('auth');

$router->get('/course/{course-slug}/section/{section-slug}/lesson/create', 'lesson/create.php')->only('auth');
$router->post('/course/{course-slug}/section/{section-slug}/lesson/create', 'lesson/store.php')->only('auth');
$router->get('/course/{course-slug}/section/{section-slug}/lesson/{lesson-slug}', 'lesson/index.php')->only('auth');

$router->get('/course-slug-checker/{slug-name}', 'course/slug_checker.php');
$router->get('/section-slug-checker/{course-slug}/{section-slug}', 'section/slug_checker.php');
$router->post('/upload-video', 'lesson/upload_video.php')->only('auth');
