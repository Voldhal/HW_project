<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\OwnerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('admin/owners', [OwnerController::class, 'index'])->name('admin.owners.index');

    Route::get('admin/cars/create/{owner_id}', [CarController::class, 'create'])->name('admin.cars.create');
    Route::resource('admin/cars', CarController::class)->except(['create']);
    Route::get('admin/cars/{car}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::delete('admin/cars/{car}', [CarController::class, 'destroy'])->name('admin.cars.destroy');
    Route::get('admin/cars', [CarController::class, 'index'])->name('admin.cars.index');
    Route::put('admin/cars/{car}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::post('admin/cars', [CarController::class, 'store'])->name('admin.cars.store');

    
});

Route::get('admin/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    
    return redirect()->back();
});