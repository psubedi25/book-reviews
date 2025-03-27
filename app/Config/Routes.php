<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\Pages;
use App\Controllers\Books;
use App\Controllers\User;
use App\Controllers\Ajax;
use App\Controllers\GoogleBooksController; // ? Don't forget this

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Books routes (in correct order)
$routes->get('books', [Books::class, 'index']);         // List books
$routes->get('books/create', [Books::class, 'create']); // Show create form
$routes->post('books', [Books::class, 'store']);        // Handle form submission
$routes->get('books/(:segment)', [Books::class, 'view']); // View individual book

// AJAX route for books
$routes->get('ajax/get/(:segment)', [Ajax::class, 'get']);

// User routes
$routes->get('/user', 'User::index');
$routes->post('/user/login', 'User::login');
$routes->post('/user/register', 'User::register');
$routes->get('/user/logout', 'User::logout');

// Static pages routes
$routes->get('pages', [Pages::class, 'index']);

// Google Books Search Route
$routes->get('googlebooks/search', [GoogleBooksController::class, 'search']);

// Must be the last route (catch-all for static pages)
$routes->get('(:segment)', [Pages::class, 'view']);
