<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;

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



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);



Route::middleware(['auth:api'])->group(function () {

    // members routes
    Route::prefix('members')->group(function(){
        Route::prefix('tasks')->group(function(){
            Route::get('/', [TaskController::class, 'index']);
            Route::post('/store', [TaskController::class, 'store']);
            Route::delete('/{task:id}', [TaskController::class, 'destroy']);
        });
    });


    //admin routes
    Route::prefix('admin')->group(function(){

        Route::get('/users', [UserController::class, 'index']);

        Route::get('/tasks', [AdminTaskController::class, 'index']);

        Route::put('/tasks/update/{task:id}', [AdminTaskController::class, 'update']);

        Route::delete('tasks/{task:id}', [AdminTaskController::class, 'destroy']);

        Route::post('tasks/mention', [AdminTaskController::class, 'mention']);

    });


});
