<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/loginAuth', 'Auth::loginAuth');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/store', 'Auth::store');
$routes->get('/forgot-password', 'Auth::forgotPassword');
$routes->post('/send-reset-link', 'Auth::sendResetLink');
$routes->get('/reset-password', 'Auth::resetPassword');
$routes->post('/update-password', 'Auth::updatePassword');
$routes->get('/logout', 'Auth::logout');
$routes->match(['get', 'post'], 'midtrans/notification', 'MidtransCallback::notification');

/* ==================== USER ==================== */
$routes->get('/user/dashboard', 'User::dashboard');
$routes->get('/user/pesan', 'User::pesan');
$routes->get('/user/portfolio', 'User\Portfolio::index');
$routes->get('/user/kontak', 'User\Kontak::index');
$routes->get('/user/booking-form', 'User\Booking::form');

// 🟢 Redirect otomatis: /user/layanan -> /user/dashboard#layanan
$routes->get('/user/layanan', function () {
    return redirect()->to('/user/dashboard#layanan');
});


$routes->group('user', ['namespace' => 'App\Controllers\User'], function($routes) {
$routes->get('layanan/detail/(:num)', 'Layanan::detail/$1');
$routes->get('pembayaran/checkout/(:num)', 'Pembayaran::checkout/$1');
$routes->post('pembayaran/proses', 'Pembayaran::proses');
$routes->get('/user/getBookings', 'User::getBookings');
$routes->post('/user/saveBooking', 'User::saveBooking');
$routes->get('profil', 'Profil::index');
$routes->post('profil/update', 'Profil::update');
});

// Calendar routes
$routes->get('calendar/events', 'Calendar::events');
$routes->post('calendar/book', 'Calendar::book');

$routes->group('owner', ['namespace' => 'App\Controllers\Owner', 'filter' => 'ownerAuth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('laporan-booking', 'Laporan::booking');
    $routes->get('laporan-booking/export', 'Laporan::exportPdfBooking');
    $routes->get('laporan-pendapatan', 'Laporan::pendapatan');
    $routes->get('laporan-pendapatan/export', 'Laporan::exportPdf');
});


/* ==================== ADMIN ==================== */
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin::dashboard');

    $routes->get('pembayaran', 'Pembayaran::index');
    $routes->get('pembayaran/detail/(:num)', 'Pembayaran::detail/$1');
    $routes->get('pembayaran/invoice/(:num)', 'Pembayaran::invoice/$1');
    $routes->get('pembayaran/create', 'Pembayaran::create');
    $routes->post('pembayaran/store', 'Pembayaran::store');
    $routes->get('pembayaran/edit/(:num)', 'Pembayaran::edit/$1');
    $routes->post('pembayaran/update/(:num)', 'Pembayaran::update/$1');
    $routes->get('pembayaran/delete/(:num)', 'Pembayaran::delete/$1');
   
 
    

    $routes->get('kontak', 'Kontak::index');
    $routes->post('kontak/update', 'Kontak::update');
    

    // Booking
    $routes->get('booking', 'Booking::index');                     // ✅ Halaman daftar booking
    $routes->get('booking/create', 'Booking::create');              // ✅ Halaman tambah booking
    $routes->post('booking/store', 'Booking::store');               // ✅ Simpan data baru
    $routes->get('booking/edit/(:num)', 'Booking::edit/$1');        // ✅ Form edit booking
    $routes->post('booking/update/(:num)', 'Booking::update/$1');   // ✅ Simpan hasil edit
    $routes->get('booking/delete/(:num)', 'Booking::delete/$1');    // ✅ Hapus booking
    $routes->get('booking/detail/(:num)', 'Booking::detail/$1');    // ✅ Detail booking
    $routes->post('booking/updateStatus/(:num)', 'Booking::updateStatus/$1'); // ✅ Update status

    // Layanan
    $routes->get('layanan', 'Layanan::index');
    $routes->get('layanan/create', 'Layanan::create');
    $routes->post('layanan/store', 'Layanan::store');
    $routes->get('layanan/edit/(:num)', 'Layanan::edit/$1');
    $routes->post('layanan/update/(:num)', 'Layanan::update/$1');
    $routes->get('layanan/delete/(:num)', 'Layanan::delete/$1');
    $routes->get('layanan/detail/(:num)', 'Layanan::detail/$1');
      
    $routes->get('user', 'User::index');
    $routes->get('user/create', 'User::create');
    $routes->post('user/store', 'User::store');
    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->post('user/update/(:num)', 'User::update/$1');

    // Portfolio
    $routes->get('portfolio', 'Portfolio::index');
    $routes->get('portfolio/create', 'Portfolio::create');
    $routes->post('portfolio/store', 'Portfolio::store');
    $routes->get('portfolio/edit/(:num)', 'Portfolio::edit/$1');
    $routes->post('portfolio/update/(:num)', 'Portfolio::update/$1');
    $routes->get('portfolio/delete/(:num)', 'Portfolio::delete/$1');
});
