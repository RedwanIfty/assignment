<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;

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
    return view('welcome');
});
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login.submit');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/dashboard',[PageController::class,'dashboard'])->name('dash')->middleware('logged');
Route::get('/dashboard/delete/{id}',[PageController::class,'delete'])->name('dash.delete')->middleware('logged');
Route::get('/dashboard/update/{id}',[PageController::class,'update'])->name('dash.update')->middleware('logged');
Route::post('/dashboard/update/{id}',[PageController::class,'updateSubmit'])->name('dash.update.submit')->middleware('logged');
Route::get('/dashboard/add-student',[PageController::class,'addStudent'])->name('add.student')->middleware('logged');
Route::post('/dashboard/add-student',[PageController::class,'addStudentSubmit'])->name('add.student.submit')->middleware('logged');
Route::get('/search',[PageController::class,'search'])->name('search')->middleware('logged');
