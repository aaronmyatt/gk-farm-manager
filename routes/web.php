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
    return view('home');
})->name('home');

Route::get('/sites', function () {
    return view('sites', [
        'sites' => \App\Models\Sites::paginate(25)
    ]);
})->name('sites');

Route::get('/tanks', function () {
    return view('tanks', [
        'tanks' => \App\Models\Tanks::paginate(25)
    ]);
})->name('tanks');

Route::get('/tank/{id}', function ($id) {
    return view('tanks', [
        'tanks' => [
            \App\Models\Tanks::findOrFail($id)
        ]
    ]);
})->name('tankDetails');

Route::get('/livestock', function () {
    return view('livestock/index', [
        'livestock' => \App\Models\Livestock::paginate(25)
    ]);
})->name('livestock');

Route::get('/livestock/form/{tank_id?}', function ($tank_id = null) {
    return view('livestock/form');
})->name('livestock-form');

Route::get('/measurements', function () {
    return view('measurements/index', [
        'measurements' => \App\Models\Measurements::paginate(15)
    ]);
})->name('measurements');

Route::get('/measurements/form/{tank_id?}', function ($tank_id = null) {
    return view('measurements/form');
})->name('measurements-form');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
