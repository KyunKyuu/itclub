<?php

use App\Http\Controllers\Api\ArticleController as ApiArticleController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\MenuAccessControlller as ApiMenuAccessControlller;
use App\Http\Controllers\Api\PreferencesController as ApiPreferencesController;
use App\Http\Controllers\Api\RoleController as ApiRoleController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Features\ArticleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Setting\MenuAccessControlller;
use App\Http\Controllers\Master\PreferencesController;
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

Route::get('/', function () {
    return redirect('/auth/login');
});
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

Route::group(['prefix' => '/setting', 'middleware' => 'auth'], function () {
    Route::get('/menu/user', [MenuAccessControlller::class, 'user']);
    Route::get('/menu/role', [MenuAccessControlller::class, 'role']);
});

Route::group(['prefix' => '/member', 'middleware' => 'auth'], function () {
    Route::get('/{resource}/profile', [IndexController::class, 'profile_user']);
    Route::get('/{resource}/dashboard', [IndexController::class, 'dashboard_user']);
    Route::get('/{resource}/setting', [IndexController::class, 'setting_user']);
    Route::get('/{resource}/setting/changepassword', [IndexController::class, 'changepassword_setting']);
    Route::get('/{resource}/activities', [IndexController::class, 'activities_user']);
});

Route::group(['prefix' => '/features', 'middleware' => 'auth'], function () {
    Route::get('/article/list_article', [ArticleController::class, 'list_article']);
    Route::get('/article/view/{id}/{resource}', [ArticleController::class, 'article']);
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
        Route::get('/all', [ApiRoleController::class, 'get_role']);
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

    Route::group(['prefix' => '/access', 'middleware' => ['auth']], function () {
        Route::get('/get/section', [ApiMenuAccessControlller::class, 'section_get']);
        Route::get('/get/menu', [ApiMenuAccessControlller::class, 'menu_get']);
        Route::get('/get/submenu', [ApiMenuAccessControlller::class, 'submenu_get']);
        Route::get('/get/users', [ApiMenuAccessControlller::class, 'users_get']);
        Route::get('/users/section', [ApiMenuAccessControlller::class, 'users_section']);
        Route::get('/users/menu', [ApiMenuAccessControlller::class, 'users_menu']);
        Route::get('/users/submenu', [ApiMenuAccessControlller::class, 'users_submenu']);
        Route::post('/users/change/section', [ApiMenuAccessControlller::class, 'users_change_section']);
        Route::post('/users/change/menu', [ApiMenuAccessControlller::class, 'users_change_menu']);
        Route::post('/users/change/submenu', [ApiMenuAccessControlller::class, 'users_change_submenu']);
        Route::post('/change/section', [ApiMenuAccessControlller::class, 'section_change']);
        Route::post('/change/menu', [ApiMenuAccessControlller::class, 'menu_change']);
        Route::post('/change/submenu', [ApiMenuAccessControlller::class, 'submenu_change']);
    });

    Route::group(['prefix' => '/member', 'middleware' => ['auth']], function () {
        Route::get('/get/profile', [MemberController::class, 'get_profile']);
        Route::post('/insert/profile', [MemberController::class, 'insert_profile']);
        Route::get('/delete/image/profile', [MemberController::class, 'delete_image_profile']);
        Route::post('/setting/changepassword', [MemberController::class, 'setting_changepassword']);
    });

    Route::group(['prefix' => '/features', 'middleware' => ['auth']], function () {
        Route::get('/article/get', [ApiArticleController::class, 'get_article']);
        Route::get('/article/get_first', [ApiArticleController::class, 'get_first_article']);
        Route::post('/article/insert', [ApiArticleController::class, 'insert_article']);
        Route::post('/article/category', [ApiArticleController::class, 'category_article']);
        Route::post('/article/save_content', [ApiArticleController::class, 'save_content']);
        Route::post('/article/update', [ApiArticleController::class, 'update_article']);
        Route::delete('/article/delete', [ApiArticleController::class, 'delete_article']);
        Route::post('/article/suspended', [ApiArticleController::class, 'suspended_article']);
    });
});
