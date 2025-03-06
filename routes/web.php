<?php

use Illuminate\Support\Facades\Route;

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
    return to_route('home');
});
Route::middleware('auth')->group(function () {
    Route::get('/mypassword/change', [App\Http\Controllers\Auth\PasswordChangeController::class, 'showChangePasswordGet'])->name('mypassword.change');
    Route::post('/mypassword/change', [App\Http\Controllers\Auth\PasswordChangeController::class, 'changePasswordPost'])->name('mypassword.update');
    Route::post('/mypassword/reset/{id}', [App\Http\Controllers\Auth\PasswordChangeController::class, 'resetPasswordPost'])->name('mypassword.reset');
    Route::middleware('can:active')->group(function () {
        Route::put('/setting/users/{user}/activation', [App\Http\Controllers\Setting\UserController::class, 'activation'])->name('users.activation');
        Route::resource('setting/roles', App\Http\Controllers\Setting\RoleController::class)->except('show');
        Route::resource('setting/permissions', App\Http\Controllers\Setting\PermissionController::class)->except('show');
        Route::resource('setting/rolepermissions', App\Http\Controllers\Setting\RolePermissionController::class)->only('edit', 'update');
        Route::resource('setting/userpermissions', App\Http\Controllers\Setting\UserPermissionController::class)->only('edit', 'update');
        Route::resource('setting/userroles', App\Http\Controllers\Setting\UserRoleController::class)->only('edit', 'update');
        Route::resource('setting/users', App\Http\Controllers\Setting\UserController::class)->except('show');
        Route::resource('setting/navigations', App\Http\Controllers\Setting\NavigationController::class)->except('show');
        Route::resource('setting/prodis', App\Http\Controllers\Prodi\ProdiController::class)->except('show');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
