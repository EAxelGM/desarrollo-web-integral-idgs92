<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AlumnosController as Alumnos;

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
    return view('welcome');
});

Route::resource('alumnos', Alumnos::class);
Route::get('alumnos-ajax', [Alumnos::class, 'getAlumnos'])->name('alumnos-list');
Route::get('download-pdf-report-alumnos', [Alumnos::class, 'getPdfAlumnos'])->name('alumnos-pdf');
