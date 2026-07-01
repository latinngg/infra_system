<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('jobrequest');
});

Route::get('/assets_handover', function () {
    return view('assets_handover');
});

Route::get('/hs-registration', function () {
    return view('hs_registrationform');
});

Route::get('/preventive-annual', function () {
    return view('preventive_annual');
});

Route::get('/preventive-checklist', function () {
    return view('preventive_checklist');
});

Route::get('/preventive-datasheet', function () {
    return view('preventive_datasheet');
});
