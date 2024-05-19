<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ProjectController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
// Route::prefix('{lang}/admin')->name('admin.')->middleware('auth','check_user_type')->group
Route::prefix('admin')->name('admin.')->middleware('auth','check_user_type')->group(function(){

Route::get('/',[AdminController::class,'index'])->name('index');
Route::get('/freelancers',[AdminController::class,'freelancers'])->name('freelancers');
Route::delete('/freelancers/{id}',[AdminController::class,'freelancers_destroy'])->name('freelancers.destroy');
Route::resource('categories', CategoryController::class);
Route::resource('skills', SkillController::class);
Route::resource('projects', ProjectController::class);

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('not_allowed', 'not_allowed');


// Route::get('/{category}') // model binding  لازم نفس الاسم المتغير والموديل



});


