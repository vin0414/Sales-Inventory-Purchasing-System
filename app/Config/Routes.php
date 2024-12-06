<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//home controller
$routes->post('/auth','Home::auth');
$routes->get('/logout','Home::logout');
$routes->get('/forgot-password','Home::forgotPassword');
//admin controller
$routes->post('upload-logo','Admin::uploadLogo');
$routes->post('about','Admin::about');
$routes->post('save-warehouse','Admin::saveWarehouse');
$routes->post('save-account-expense','Admin::saveAccountExpense');

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    //admin module
    $routes->get('admin/overview','Admin::overview');
    //products
    $routes->get('admin/products','Admin::products');
    $routes->get('admin/products/new','Admin::newProduct');
    //others
    $routes->get('admin/settings','Admin::settings');
    $routes->get('admin/new-account-expense','Admin::newAccountExpense');
    $routes->get('admin/edit-code/(:any)','Admin::editCode/$1');
    $routes->get('admin/new-warehouse','Admin::newWarehouse');
    $routes->get('admin/edit-warehouse/(:any)','Admin::editWarehouse/$1');
    $routes->get('admin/recovery','Admin::recovery');
    //user module
    $routes->get('user/overview','User::overview');
});

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('/', 'Home::index');
});
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
