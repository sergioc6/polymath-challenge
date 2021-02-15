<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('home');
});

// Tasks Routes
Route::resource('tasks', TaskController::class)->middleware(['auth']);
Route::get('tasks/{task}/complete', [ TaskController::class, 'completeTask'])->where('task', '[0-9]+')->name('tasks.complete')->middleware(['auth']);;

// Auth Routes
require __DIR__.'/auth.php';
