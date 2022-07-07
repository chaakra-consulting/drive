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
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Beranda::index');
$routes->add('/ubahprofil', 'Beranda::ubahprofil');
$routes->add('/ubahsosmed', 'Beranda::ubahsosmed');

$routes->add('/project_saya', 'Project_Saya::index');
$routes->add('/detail_project_saya', 'Detail_Project_Saya::index');
$routes->add('/add_file_project_saya', 'Detail_Project_Saya::tambah');
$routes->add('/update_file_project_saya', 'Detail_Project_Saya::ubah');
$routes->add('/delete_file_project_saya', 'Detail_Project_Saya::hapus');

$routes->add('/manajemenusers', 'Manajemen_Users::index', ['filter' => 'role:admin,super admin']);
$routes->add('/nonaktifusers', 'Manajemen_Users::nonaktifusers', ['filter' => 'role:admin,super admin']);
$routes->add('/reaktifusers', 'Manajemen_Users::reaktifusers', ['filter' => 'role:admin,super admin']);
$routes->add('/detailsuser', 'Manajemen_Users::detailsuser', ['filter' => 'role:admin,super admin']);
$routes->add('/add_permision_project', 'Manajemen_Users::add', ['filter' => 'role:admin,super admin']);
$routes->add('/delete_permision_project', 'Manajemen_Users::delete', ['filter' => 'role:admin,super admin']);
$routes->add('/delete_all_permision_project', 'Manajemen_Users::deleteall', ['filter' => 'role:admin,super admin']);


$routes->add('/dataperusahaan', 'Manajemen_Data_Project::index', ['filter' => 'role:admin,super admin']);
$routes->add('/add_project', 'Manajemen_Data_Project::tambah', ['filter' => 'role:admin,super admin']);
$routes->add('/update_project', 'Manajemen_Data_Project::ubah', ['filter' => 'role:admin,super admin']);
$routes->add('/delete_project', 'Manajemen_Data_Project::hapus', ['filter' => 'role:admin,super admin']);

$routes->add('/detail_data_project', 'Manajemen_Detail_Data_Project::index', ['filter' => 'role:admin,super admin']);
$routes->add('/add_file_project', 'Manajemen_Detail_Data_Project::tambah', ['filter' => 'role:admin,super admin']);
$routes->add('/delete_file_project', 'Manajemen_Detail_Data_Project::hapus', ['filter' => 'role:admin,super admin']);
$routes->add('/update_file_project', 'Manajemen_Detail_Data_Project::ubah', ['filter' => 'role:admin,super admin']);
$routes->add('/download_file_project', 'Manajemen_Detail_Data_Project::download', ['filter' => 'role:admin,super admin']);

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
