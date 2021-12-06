<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UsersController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>['auth']], function (){
    Route::resources([
    'tasks'=>TaskController::class,
    'statuses'=>StatusController::class,
    'users'=> UsersController::class,
    ]);
    
    Route::get('delete/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.delete');
    Route::get('tasks/order/{field}/{order}', [TaskController::class, 'indexOrder'])->name('tasks.indexOrder');
    
    
    Route::post('tasks/order/{field}/{order}', [TaskController::class, 'indexOrder'])->name('tasks.indexOrder');
});

require __DIR__.'/auth.php';
