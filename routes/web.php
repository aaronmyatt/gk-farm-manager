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
        'livestock' => \App\Models\Livestock::orderBy('updated_at', 'desc')->paginate(25)
    ]);
})->name('livestock');

Route::get('/measurements', function () {
    return view('measurements/index', [
        'measurements' => \App\Models\Measurements::orderBy('updated_at', 'desc')->paginate(25)
    ]);
})->name('measurements');


// TODO: nest all these under a route group(?)
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/livestock/form/{tank_id?}', function ($tank_id = null) {
    return view('livestock/form');
})->name('livestock-form');

Route::middleware(['auth:sanctum', 'verified'])->get('/livestock/{id}/edit', function ($id) {
    return view('livestock/edit', [
        'livestock' => \App\Models\Livestock::findOrFail($id)
    ]);
})->name('livestockEdit');

Route::middleware(['auth:sanctum', 'verified'])->get('/measurements/{id}/edit', function ($id) {
    return view('measurements/edit', [
        'measurements' => \App\Models\Measurements::findOrFail($id)
    ]);
})->name('measurementEdit');

Route::middleware(['auth:sanctum', 'verified'])->get('/measurements/form/{tank_id?}', function ($tank_id = null) {
    return view('measurements/form');
})->name('measurements-form');