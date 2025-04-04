<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\Pages;
use App\Controllers\Books;
use App\Controllers\User;
use App\Controllers\Ajax;
use App\Controllers\GoogleBooksController;
use App\Controllers\Contact;

/**
 * @var RouteCollection $routes
 */

// ?? Default Home
$routes->get('/', [Home::class, 'index']);

// ?? Local Book Routes
$routes->get('books',                    [Books::class, 'index']);
$routes->get('books/create',             [Books::class, 'create']);
$routes->post('books',                   [Books::class, 'store']);
$routes->get('books/(:segment)',         [Books::class, 'view']);
$routes->post('books/submitReview',      [Books::class, 'submitReview']); // ? Review submission (secured in controller)

// ?? AJAX Routes
$routes->get('ajax/get/(:segment)',      [Ajax::class, 'get']);
$routes->post('ajax/saveBook',           [Ajax::class, 'saveBook']);
$routes->get('ajax/googlebook/(:num)',   [Ajax::class, 'getGoogleBook/$1']);

// ?? Google Books API
$routes->get('googlebooks/search',       [GoogleBooksController::class, 'search']);
$routes->post('googlebooks/save',        [GoogleBooksController::class, 'saveBook']);
$routes->get('googlebooks/(:num)',       [GoogleBooksController::class, 'view/$1']);

// ?? User Authentication
$routes->get('user',                     [User::class, 'index']);
$routes->post('user/login',              [User::class, 'login']);
$routes->post('user/register',           [User::class, 'register']);
$routes->get('user/logout',              [User::class, 'logout']);

// ?? Contact Page
$routes->get('contact',                  [Contact::class, 'index']);
$routes->post('contact/submit',          [Contact::class, 'submit']);

// ?? Static Pages
$routes->get('pages',                    [Pages::class, 'index']);
$routes->get('pages/(:segment)',         [Pages::class, 'view']);

// ?? Catch-All Route
$routes->get('(:segment)',               [Pages::class, 'view']); // Keep this last
