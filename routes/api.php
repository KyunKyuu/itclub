<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    MemberController,DivisionController,ImageDivisionController,AlumniController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function() {

 Route::prefix('members')->group(function() {
    Route::get('table',[MemberController::class, 'index'])->name('member.table');
    Route::get('show/{id}',[MemberController::class, 'show'])->name('member.show');
    Route::get('create', [MemberController::class, 'create'])->name('member.create');
    Route::post('create',[MemberController::class, 'store'])->name('member.store');
    Route::get('edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::post('edit/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('delete/{id}',[MemberController::class, 'destroy'])->name('member.destroy');
 });

 Route::prefix('divisions')->group(function() {
    Route::get('table',[DivisionController::class, 'index'])->name('division.table');
    Route::get('show/{id}',[DivisionController::class, 'show'])->name('division.show');
    Route::get('create', [DivisionController::class, 'create'])->name('division.create');
    Route::post('create',[DivisionController::class, 'store'])->name('division.store');
    Route::get('edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
    Route::post('edit/{id}', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('delete/{id}',[DivisionController::class, 'destroy'])->name('division.destroy');
 });

 Route::prefix('imageDivision')->group(function() {
     Route::get('table',[ImageDivisionController::class, 'index'])->name('imagedivision.table');
     Route::get('create',[ImageDivisionController::class, 'create'])->name('imagedivision.create');
     Route::post('create',[ImageDivisionController::class, 'store'])->name('imagedivision.store');    
 });

 Route::prefix('alumnies')->group(function() {
    Route::get('table',[AlumniController::class, 'index'])->name('alumni.table');
    Route::get('show/{id}',[AlumniController::class, 'show'])->name('alumni.show');
    Route::get('create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('create',[AlumniController::class, 'store'])->name('alumni.store');
    Route::get('edit/{id}', [AlumniController::class, 'edit'])->name('Alumni.edit');
    Route::post('edit/{id}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('delete/{id}',[AlumniController::class, 'destroy'])->name('alumni.destroy');
 });

});