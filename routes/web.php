<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardStaffController;


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

// Login Option
Route::get('/', function () {
    return view('welcome');
});

//  For Manager
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// For Staff
Route::get('/loginStaff', [DashboardStaffController::class, 'login']);
Route::post('/loginStaff', [DashboardStaffController::class, 'authenticate']);

// For Register
Route::get('/register', [RegisterController::class, 'indexManager']);
Route::post('/register', [RegisterController::class, 'store']);

// After login manager
Route::get('/dashboard', [DashboardController::class, 'index']);

// After login Staff
Route::get('/dashboardStaff', [DashboardStaffController::class, 'index']);

// All about the Tickets
Route::get('/dashboard/tickets', [DashboardController::class, 'create']);
Route::post('/dashboard/tickets', [DashboardController::class, 'store']);
Route::get('/dashboard/tickets/detail/{id}', [DashboardController::class, 'show']);
Route::get('/dashboard/tickets/edit/{id}', [DashboardController::class, 'edit']);
Route::put('/dashboard/tickets/edit/{id}', [DashboardController::class, 'update']);
Route::delete('/dashboard/tickets/{id}', [DashboardController::class, 'destroy']);

// All about the Staff
Route::get('/dashboard/staff', [DashboardController::class, 'createStaff']);
Route::post('/dashboard/staff', [DashboardController::class, 'storeStaff']);
Route::get('/dashboard/staff/edit/{id}', [DashboardController::class, 'editStaff']);
Route::put('/dashboard/staff/edit/{id}', [DashboardController::class, 'updateStaff']);

// For buying the tickets
Route::get('/dashboardStaff/pembeliantickets', [DashboardStaffController::class, 'pembelian']);
Route::post('/dashboardStaff/hargatiket/{jenisTiket}', [DashboardStaffController::class, 'hargaTiket']);
Route::post('/dashboardStaff/cetak-tiket', [DashboardStaffController::class, 'store']);


