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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/loginStaff', [DashboardStaffController::class, 'login']);
Route::post('/loginStaff', [DashboardStaffController::class, 'authenticate']);
Route::post('/logoutStaff', [DashboardStaffController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'indexManager']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/tickets', [DashboardController::class, 'create']);
Route::post('/dashboard/tickets', [DashboardController::class, 'store']);
Route::get('/dashboard/tickets/{id}', [DashboardController::class, 'show']);



Route::get('/dashboard/staff', [DashboardController::class, 'createStaff']);
Route::post('/dashboard/staff', [DashboardController::class, 'storeStaff']);

Route::get('/dashboardStaff', [DashboardStaffController::class, 'index']);

Route::get('/dashboard/pembeliantickets', [DashboardStaffController::class, 'pembelian']);
Route::get('/dashboard/pembeliantickets/harga/{tiketId}', [DashboardStaffController::class, 'getHarga']);

