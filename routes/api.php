<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    MemberController,DivisionController,ImageDivisionController,AlumniController,AuthController,PrestationController,CategoryController,GalleryController,ImageGalleryController,BlogController
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
 
 Route::post('/register',[AuthController::class,'register']);
 Route::post('/login',[AuthController::class,'login']);

  Route::prefix('members')->group(function() {
    Route::get('table',[MemberController::class, 'index'])->name('member.table');
    Route::get('show/{id}',[MemberController::class, 'show'])->name('member.show');
    Route::get('insert', [MemberController::class, 'create'])->name('member.create');
    Route::post('insert',[MemberController::class, 'store'])->name('member.store');
    Route::get('get/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::post('get/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('delete/{id}',[MemberController::class, 'destroy'])->name('member.destroy');
 });

  Route::prefix('divisions')->group(function() {
    Route::get('table',[DivisionController::class, 'index'])->name('division.table');
    Route::get('show/{id}',[DivisionController::class, 'show'])->name('division.show');
    Route::get('insert', [DivisionController::class, 'create'])->name('division.create');
    Route::post('insert',[DivisionController::class, 'store'])->name('division.store');
    Route::get('get/{id}', [DivisionController::class, 'edit'])->name('division.edit');
    Route::post('get/{id}', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('delete/{id}',[DivisionController::class, 'destroy'])->name('division.destroy');
 });

  Route::prefix('imageDivision')->group(function() {
     Route::get('table',[ImageDivisionController::class, 'index'])->name('image_division.table');
     Route::get('insert',[ImageDivisionController::class, 'create'])->name('image_division.create');
     Route::post('insert',[ImageDivisionController::class, 'store'])->name('image_division.store');  
     Route::delete('delete/{id}',[ImageDivisionController::class, 'destroy'])->name('image_division.destroy');    
 });

  Route::prefix('alumnies')->group(function() {
    Route::get('table',[AlumniController::class, 'index'])->name('alumni.table');
    Route::get('show/{id}',[AlumniController::class, 'show'])->name('alumni.show');
    Route::get('insert', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('insert',[AlumniController::class, 'store'])->name('alumni.store');
    Route::get('get/{id}', [AlumniController::class, 'edit'])->name('Alumni.edit');
    Route::post('get/{id}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('delete/{id}',[AlumniController::class, 'destroy'])->name('alumni.destroy');
 });

  Route::prefix('prestations')->group(function() {
    Route::get('table',[PrestationController::class, 'index'])->name('prestation.table');
    Route::get('show/{id}',[PrestationController::class, 'show'])->name('prestation.show');
    Route::get('insert', [PrestationController::class, 'create'])->name('prestation.create');
    Route::post('insert',[PrestationController::class, 'store'])->name('prestation.store');
    Route::get('get/{id}', [PrestationController::class, 'edit'])->name('prestation.edit');
    Route::post('get/{id}', [PrestationController::class, 'update'])->name('prestation.update');
    Route::delete('delete/{id}',[PrestationController::class, 'destroy'])->name('prestation.destroy');
 });

   Route::prefix('categories')->group(function() {
    Route::get('table',[CategoryController::class, 'index'])->name('category.table');
    Route::get('show/{id}',[CategoryController::class, 'show'])->name('category.show');
    Route::get('insert', [CategoryController::class, 'create'])->name('category.create');
    Route::post('insert',[CategoryController::class, 'store'])->name('category.store');
    Route::get('get/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('get/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
 });

   Route::prefix('galleries')->group(function() {
    Route::get('table',[GalleryController::class, 'index'])->name('gallery.table');
    Route::get('show/{id}',[GalleryController::class, 'show'])->name('gallery.show');
    Route::get('insert', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('insert',[GalleryController::class, 'store'])->name('gallery.store');
    Route::get('get/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('get/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('delete/{id}',[GalleryController::class, 'destroy'])->name('gallery.destroy');
 });

    Route::prefix('imageGallery')->group(function() {
     Route::get('table',[ImageGalleryController::class, 'index'])->name('image_gallery.table');
     Route::get('insert',[ImageGalleryController::class, 'create'])->name('image_gallery.create');
     Route::post('insert',[ImageGalleryController::class, 'store'])->name('image_gallery.store');    
     Route::delete('delete/{id}',[ImageGalleryController::class, 'destroy'])->name('image_gallery.destroy'); 
 });

    Route::prefix('blogs')->group(function() {
    Route::get('table',[BlogController::class, 'index'])->name('blog.table');
    Route::get('show/{id}',[BlogController::class, 'show'])->name('blog.show');
    Route::get('insert', [BlogController::class, 'create'])->name('blog.create');
    Route::post('insert',[BlogController::class, 'store'])->name('blog.store');
    Route::get('get/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('get/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('delete/{id}',[BlogController::class, 'destroy'])->name('blog.destroy');
 });

});