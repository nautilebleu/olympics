<?php

const ROUTES = [
	'/' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'home'
  ],
  '/articles' => [
    'controller' => App\Controller\ArticleController::class,
    'method' => 'index'
    ],
    '/login' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'login'
    ],
    '/register' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'register'
    ],
];
