<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CitizenController;

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

// Route::get('/', [Controller::class, 'welcome'])->name('welcome');



Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    // The Resource Controller -all
    Route::middleware('admin')->group(function() {

    });
    
    Route::resource('users', UserController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('cities', CityController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('citizens', CitizenController::class);
    Route::resource('certificates', CertificateController::class);

    // The PDF Resource
    Route::get('/certificates/{id}/residency', [PdfController::class, 'certificate'])->name('certificates.residency');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 


require __DIR__.'/auth.php';
