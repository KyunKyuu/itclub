<?php

use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\PreferencesController as ApiPreferencesController;
use App\Http\Controllers\Api\RoleController as ApiRoleController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Setting\PreferencesController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/dashboard/general/index', [IndexController::class, 'index']);
Route::get('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');

Route::group(['prefix' => '/master', 'middleware' => 'auth'], function () {
    Route::get('/preferences/section', [PreferencesController::class, 'section']);
    Route::get('/preferences/menu', [PreferencesController::class, 'menu']);
    Route::get('/preferences/submenu', [PreferencesController::class, 'submenu']);
    Route::get('/user', [UserController::class, 'user']);
    Route::get('/role', [RoleController::class, 'role']);
});

// !NOTE API Request & Response
Route::prefix('/api/v1')->group(function () {

    Route::group(['prefix' => '/auth'], function () {
        Route::post('/register', [ApiAuthController::class, 'register']);
        Route::post('/login', [ApiAuthController::class, 'login']);
        Route::get('/logout', [ApiAuthController::class, 'logout']);
    });

    Route::group(['prefix' => '/user'], function () {
        Route::get('/get', [ApiUserController::class, 'user']);
        Route::post('/insert', [ApiUserController::class, 'insert_user']);
        Route::delete('/delete', [ApiUserController::class, 'delete_user']);
        Route::post('/update', [ApiUserController::class, 'update_user']);
        Route::put('/status/update', [ApiUserController::class, 'update_status_user']);
    });

    Route::group(['prefix' => '/role'], function () {
        Route::get('/get', [ApiRoleController::class, 'role']);
        Route::post('/insert', [ApiRoleController::class, 'insert_role']);
        Route::delete('/delete', [ApiRoleController::class, 'delete_role']);
        Route::post('/update', [ApiRoleController::class, 'update_role']);
        Route::put('/status/update', [ApiRoleController::class, 'update_status_role']);
    });

    Route::group(['prefix' => '/preferences'], function () {
        Route::get('/section', [ApiPreferencesController::class, 'section']);
        Route::get('/menu', [ApiPreferencesController::class, 'menu']);
        Route::get('/submenu', [ApiPreferencesController::class, 'submenu']);
    });

    Route::group(['prefix' => '/section'], function () {
        Route::get('/get/{id}', [ApiPreferencesController::class, 'get_section']);
        Route::post('/insert', [ApiPreferencesController::class, 'insert_section']);
        Route::delete('/delete', [ApiPreferencesController::class, 'delete_section']);
        Route::post('/update', [ApiPreferencesController::class, 'update_section']);
        Route::put('/status/update', [ApiPreferencesController::class, 'update_status_section']);
    });

    Route::group(['prefix' => '/menu'], function () {
        Route::get('/get/{id}', [ApiPreferencesController::class, 'get_menu']);
        Route::post('/insert', [ApiPreferencesController::class, 'insert_menu']);
        Route::delete('/delete', [ApiPreferencesController::class, 'delete_menu']);
        Route::post('/update', [ApiPreferencesController::class, 'update_menu']);
        Route::put('/status/update', [ApiPreferencesController::class, 'update_status_menu']);
    });

    Route::group(['prefix' => '/submenu'], function () {
        Route::get('/get/{id}', [ApiPreferencesController::class, 'get_submenu']);
        Route::post('/insert', [ApiPreferencesController::class, 'insert_submenu']);
        Route::delete('/delete', [ApiPreferencesController::class, 'delete_submenu']);
        Route::post('/update', [ApiPreferencesController::class, 'update_submenu']);
        Route::put('/status/update', [ApiPreferencesController::class, 'update_status_submenu']);
    });
});
