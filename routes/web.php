<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KartuMonitoringController;
use App\Http\Controllers\ExportToExcelController;
use App\Http\Controllers\UserController;

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
    return view('index');
})->name('home');

Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kartu-monitoring', KartuMonitoringController::class);

Route::get('/export-excel/kartu-monitorings', [ExportToExcelController::class, 'exportKartuMonitoringToExcel'])->name(
    'kartu-monitorings.export-excel'
);

Route::resource('users', UserController::class);
Route::get('/export-excel/users', [ExportToExcelController::class, 'exportUsersToExcel'])->name('users.export-excel');
