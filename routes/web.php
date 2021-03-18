<?php

use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\PreferencesController as ApiPreferencesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IndexController;
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
});

// !NOTE API Request & Response
Route::group(['prefix' => '/api/v1'], function () {
    Route::post('/auth/register', [ApiAuthController::class, 'register']);
    Route::post('/auth/login', [ApiAuthController::class, 'login']);
    Route::get('/auth/logout', [ApiAuthController::class, 'logout']);
    Route::get('/preferences/section', [ApiPreferencesController::class, 'section']);
    Route::get('/section/get/{id}', [ApiPreferencesController::class, 'get_section']);
    Route::post('/section/insert', [ApiPreferencesController::class, 'insert_section']);
    Route::delete('/section/delete', [ApiPreferencesController::class, 'delete_section']);
    Route::post('/section/update', [ApiPreferencesController::class, 'update_section']);
    Route::get('/preferences/menu', [ApiPreferencesController::class, 'menu']);
    Route::get('/menu/get/{id}', [ApiPreferencesController::class, 'get_menu']);
    Route::post('/menu/insert', [ApiPreferencesController::class, 'insert_menu']);
    Route::delete('/menu/delete', [ApiPreferencesController::class, 'delete_menu']);
    Route::post('/menu/update', [ApiPreferencesController::class, 'update_menu']);
    Route::get('/preferences/submenu', [ApiPreferencesController::class, 'submenu']);
    Route::get('/submenu/get/{id}', [ApiPreferencesController::class, 'get_submenu']);
    Route::post('/submenu/insert', [ApiPreferencesController::class, 'insert_submenu']);
    Route::delete('/submenu/delete', [ApiPreferencesController::class, 'delete_submenu']);
    Route::post('/submenu/update', [ApiPreferencesController::class, 'update_submenu']);
});
