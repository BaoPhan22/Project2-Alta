<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\QueuingController;
use App\Http\Controllers\ServicesController;
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

// Dashboard Controller
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'Show'])->middleware(['auth', 'verified'])->name('dashboard');
});



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
    Route::get('/myprofile/{id}', 'MyProfile')->name('myprofile');
});


// Role Controller
Route::controller(RoleController::class)->group(function () {
    Route::get('/system/role', 'ShowRole')->name('system.role');
    Route::get('/system/role/add', 'AddRole')->name('system.role.add');
    Route::get('/system/role/edit/{id}', 'EditRole')->name('system.role.edit');

    Route::post('/system/role/store', 'StoreRole')->name('system.role.store');
    Route::post('/system/role/update', 'UpdateRole')->name('system.role.update');
});

// Equipments Controller
Route::controller(EquipmentsController::class)->group(function () {
    Route::get('/equipments/all', 'ShowEquipments')->name('equipments.all');
    Route::get('/equipments/add', 'AddEquipments')->name('equipments.add');
    Route::post('/equipments/store', 'StoreEquipments')->name('equipments.store');
    Route::get('/equipments/edit/{id}', 'EditEquipments')->name('equipments.edit');
    Route::post('/equipments/update', 'UpdateEquipments')->name('equipments.update');
    Route::get('/equipments/detail/{id}', 'ShowEquipmentsDetail')->name('equipments.detail');
});

// Services Controller
Route::controller(ServicesController::class)->group(function () {
    Route::get('/services/all', 'ShowServices')->name('services.all');
    Route::get('/services/add', 'AddServices')->name('services.add');
    Route::post('/services/store', 'StoreServices')->name('services.store');
    Route::get('/services/edit/{id}', 'EditServices')->name('services.edit');
    Route::get('/services/detail/{id}', 'DetailServices')->name('services.detail');
    Route::post('/services/update', 'UpdateServices')->name('services.update');
});

// Diaries Controller
Route::controller(DiaryController::class)->group(function () {
    Route::get('system/diary/all', 'ShowDiary')->name('diary.all');
});

// Queuing Controller
Route::controller(QueuingController::class)->group(function () {
    Route::get('/report/{sd?}/{ed?}', 'ReportQueuings')->name('report');
    Route::post('/report', 'ReportByDate')->name('reportByDate');
    Route::get('/queuings/all', 'ShowQueuings')->name('queuings.all');
    Route::get('/queuings/add', 'AddQueuings')->name('queuings.add');
    Route::post('/queuings/add', 'StoreQueuings')->name('queuings.store');
    Route::get('/queuings/detail/{id}', 'ShowQueuingsDetail')->name('queuings.detail');
});

require __DIR__ . '/auth.php';
