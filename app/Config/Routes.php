<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers'); //Letak dari Halaman Utama Welcome
$routes->setDefaultController('Home'); //ada di file Home.php dan Controller Home
$routes->setDefaultMethod('index'); //dan ini adalah method index
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/pages/populer', 'Pages::populer');
$routes->get('/pages/create', 'Pages::create');
$routes->get('/pages/about', 'Pages::about');
// $routes->get('/pages/contact', 'Pages::contact');
// $routes->get('/pages/save', 'Pages::save');
$routes->get('/komik/create', 'Komik::create');
$routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
$routes->delete('/komik/(:num)', 'Komik::delete/$1');
$routes->get('/komik/bacakomik', 'Komik::bacakomik');
$routes->get('/komik/bacanovel', 'Komik::bacanovel');
// $routes->get('/pages/detail/(:any)', 'Pages::detail/$1');
$routes->get('/komik/(:any)', 'Komik::detail/$1');
// $routes->get('/komik/detailuser/(:any)', 'Komik::detailuser/$1');
$routes->get('/pages/(:segment)', 'Pages::detail/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
