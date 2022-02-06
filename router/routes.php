<?php

use App\Services\Router;
use App\controllers\usersController;

Router::page('/login','login');
Router::page('/register','register');
Router::page('/main','main');

Router::post('/signup', usersController::class, 'create');
Router::post('/signin', usersController::class, 'read');
Router::post('/logout', usersController::class, 'logout');

Router::enable();