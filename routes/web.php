<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
// use App\Http\Controllers\Auth\RegisteredUserController;

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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Controller
Route::controller(ProfileController::class)->group(function () {
    Route::get('/system/user', 'ShowUsers')->name('system.user');
    Route::get('/system/user/add', 'AddUser')->name('system.user.add');
    Route::get('/system/user/edit/{id}', 'EditUser')->name('system.user.edit');
    Route::post('/system/user/store', 'StoreUser')->name('system.user.store');
    Route::post('/system/user/update', 'UpdateUser')->name('system.user.update');
});


// Role Controller
Route::controller(RoleController::class)->group(function () {
    Route::get('/system/role', 'ShowRole')->name('system.role');
    Route::get('/system/role/add', 'AddRole')->name('system.role.add');
    Route::get('/system/role/edit/{id}', 'EditRole')->name('system.role.edit');
    
    Route::post('/system/role/store', 'StoreRole')->name('system.role.store');
    Route::post('/system/role/update', 'UpdateRole')->name('system.role.update');
});

// User Controller
Route::controller(ProfileController::class)->group(function () {
    Route::get('/system/user', 'ShowUsers')->name('system.user');
    Route::get('/system/user/add', 'AddUser')->name('system.user.add');
    Route::get('/system/user/edit/{id}', 'EditUser')->name('system.user.edit');
    Route::post('/system/user/store', 'StoreUser')->name('system.user.store');
    Route::post('/system/user/update', 'UpdateUser')->name('system.user.update');
});

require __DIR__.'/auth.php';