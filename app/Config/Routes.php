<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Grup route untuk admin
$routes->group('Admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');

    // karyawan 
    $routes->get('karyawan', 'Admin::karyawan');
    $routes->get('karyawan/create', 'Admin::create');
    $routes->post('karyawan/store', 'Admin::store');
    $routes->get('karyawan/edit/(:num)', 'Admin::edit/$1');
    $routes->post('karyawan/update/(:num)', 'Admin::update/$1');
    $routes->get('karyawan/delete/(:num)', 'Admin::delete/$1');
    // Menampilkan data jabatan
    $routes->get('dataJabatan', 'MasterDataController::dataJabatan');

    // Menampilkan form tambah data jabatan
    $routes->get('dataJabatan/create', 'MasterDataController::createJabatan');

    // Menyimpan data jabatan
    $routes->post('dataJabatan/store', 'MasterDataController::storeJabatan');

    // Menampilkan form edit data jabatan
    $routes->get('dataJabatan/edit/(:num)', 'MasterDataController::editJabatan/$1');

    // Mengupdate data jabatan
    $routes->post('dataJabatan/update/(:num)', 'MasterDataController::updateJabatan/$1');

    // Menghapus data jabatan
    $routes->get('dataJabatan/delete/(:num)', 'MasterDataController::deleteJabatan/$1');
});

// Grup route untuk karyawan
$routes->group('Karyawan', ['filter' => 'role:karyawan'], function ($routes) {
    $routes->get('dashboard', 'Karyawan::index');
    $routes->get('data-gaji', 'Karyawan::dataGaji');
    $routes->get('data-absensi', 'Karyawan::dataAbsensi');
});

$routes->get('data-gaji', 'GajiController::index');
$routes->get('GajiController/cetak', 'GajiController::cetak');
$routes->get('GajiController/filter', 'GajiController::filter');


$routes->group('absensi', function ($routes) {
    $routes->get('/', 'AbsensiController::index');
    $routes->get('input', 'AbsensiController::input');
    $routes->post('simpan', 'AbsensiController::simpan');
});

$routes->group('potongan-gaji', function ($routes) {
    $routes->get('/', 'PotonganGajiController::index');  // URL utama potongan gaji
    $routes->get('tambah', 'PotonganGajiController::tambah');
    $routes->post('simpan', 'PotonganGajiController::simpan');
    $routes->get('edit/(:num)', 'PotonganGajiController::edit/$1');
    $routes->post('update/(:num)', 'PotonganGajiController::update/$1');
    $routes->get('hapus/(:num)', 'PotonganGajiController::hapus/$1');
});


$routes->get('laporan/laporanGaji', 'LaporanGajiController::index');
$routes->get('gaji/filterLaporan', 'LaporanGajiController::filter');
$routes->get('gaji/cetakLaporan', 'LaporanGajiController::cetak');

$routes->get('laporan/absensi', 'LaporanAbsensiController::index');
$routes->get('laporan/absensi/filterLaporan', 'LaporanAbsensiController::filter');
$routes->get('laporan/absensi/cetakLaporan', 'LaporanAbsensiController::cetak');

$routes->get('Karyawan/dashboard', 'Karyawan::dashboard');
