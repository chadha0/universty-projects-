<?php

// return [
//   '/' => 'controllers/index.php',
//   '/about' => 'controllers/about.php',
//   '/notes' => 'controllers/notes/index.php',
//   '/note' => 'controllers/notes/show.php',
//   '/notes/create' => 'controllers/notes/create.php',
//   '/contact' => 'controllers/contact.php'
// ];

$router->get('/', 'index.php');
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');

$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->PATCH('/note', 'notes/update.php')->only('auth');

$router->delete('/notes', 'notes/destroy.php')->only('auth');

$router->post('/notes', 'notes/store.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

$router->get('/uploads/create', 'upload/create.php')->only('auth');
$router->post('/uploads/image', 'upload/store.php')->only('auth');

$router->get('/uploads', 'upload/show.php')->only('auth');
