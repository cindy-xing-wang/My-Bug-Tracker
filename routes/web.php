<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('app');
})->name('home');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
//Google login
Route::get('/login/google',[LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback',[LoginController::class, 'handleGoogleCallback']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/projects',[ProjectController::class, 'index'])->name('projects');
// ->middleware('auth');
Route::post('/projects',[ProjectController::class, 'store']);

Route::get('/projects/create',[ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects/{project}/show',[ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit',[ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/projects/{project}/update',[ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}',[ProjectController::class, 'destroy'])->name('projects.destroy');

Route::post('/project/{id}/createIssue',[IssueController::class, 'store'])->name('project.createIssue');
Route::get('/project/{issue}/editIssue',[IssueController::class, 'edit'])->name('project.editIssue');
Route::patch('/project/{issue}/updateIssue',[IssueController::class, 'update'])->name('project.updateIssue');
Route::delete('/project/{issue}',[IssueController::class, 'destroy'])->name('project.destroyIssue');

Route::get('/user/{user}/show',[UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/editPassword',[UserController::class, 'editPassword'])->name('user.editPassword');
Route::get('/user/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{user}/update',[UserController::class, 'update'])->name('user.update');
// Route::patch('/user/{user}/updatePassword',[UserController::class, 'updatePassword'])->name('user.updatePassword');