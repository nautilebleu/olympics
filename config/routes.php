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
  '/contact' => [
  'controller' => App\Controller\MainController::class,
  'method' => 'contact'
	],
];
