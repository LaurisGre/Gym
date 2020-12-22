<?php

use Core\Router;

// Authentication Routes
Router::add('login', '/login', '\App\Controllers\Auth\LoginController');
Router::add('logout', '/logout', '\App\Controllers\Auth\LogoutController');
Router::add('register', '/register', '\App\Controllers\Auth\RegisterController');
// Router::add('install', '/install', '\App\Controllers\Common\InstallController');

// Common Routes
Router::add('home', '/', '\App\Controllers\HomeController');
// Router::add('reviews', '/', '\App\Controllers\ReviewsController');

// User Routes
// Router::add('user_reviews', '/reviews', '\App\Controllers\User\ReviewsController');

// API Routes

