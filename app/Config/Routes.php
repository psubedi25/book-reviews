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

// Default Route
$routes->get('/', [Home::class, 'index']);

// Book Routes (Local DB)
$routes->get('books',             [Books::class, 'index']);   // List all books
$routes->get('books/create',      [Books::class, 'create']);  // Book creation form
$routes->post('books',            [Books::class, 'store']);   // Save new book
$routes->get('books/(:segment)',  [Books::class, 'view']);    // View single book

// AJAX Routes
$routes->get('ajax/get/(:segment)',     [Ajax::class, 'get']);          // Fetch local book by slug
$routes->post('ajax/saveBook',          [Ajax::class, 'saveBook']);     // Save Google Book via AJAX
$routes->get('ajax/googlebook/(:num)',  [Ajax::class, 'getGoogleBook/$1']); // NEW: Get Google Book by ID via AJAX

// Google Books API Integration
$routes->get('googlebooks/search',      [GoogleBooksController::class, 'search']);   // Search books
$routes->post('googlebooks/save',       [GoogleBooksController::class, 'saveBook']); // (Optional backup route)
$routes->get('googlebooks/(:num)',      [GoogleBooksController::class, 'view/$1']);  // NEW: View Google Book by ID

// User Authentication
$routes->get('user',              [User::class, 'index']);     // Login/Register form
$routes->post('user/login',      [User::class, 'login']);     // Login submit
$routes->post('user/register',   [User::class, 'register']);  // Register submit
$routes->get('user/logout',      [User::class, 'logout']);    // Logout

// Contact Us
$routes->get('contact',          [Contact::class, 'index']);   // Contact form
$routes->post('contact/submit', [Contact::class, 'submit']);  // Submit form

// Static Pages
$routes->get('pages',              [Pages::class, 'index']);   // Page index
$routes->get('pages/(:segment)',   [Pages::class, 'view']);    // Individual pages

// Catch-All Route (MUST be last)
$routes->get('(:segment)',         [Pages::class, 'view']);    // Fallback for any other route
