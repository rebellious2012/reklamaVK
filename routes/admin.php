<?php

use App\Http\Controllers\Admin\BlogGroup\BlogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Stages\StageController;
use App\Http\Controllers\Admin\Stages\FieldController;
use App\Http\Controllers\Admin\Stages\StepController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
    ->middleware(['auth', 'can:access-admin-dashboard'])
    ->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('admin.home');

    Route::resource('/roles', RoleController::class);
    Route::resource('/stages', StageController::class);
    Route::resource('/fields', FieldController::class);
    Route::resource('/steps', StepController::class);
    Route::resource('/blogs', BlogController::class);

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/info/{user}', [UserController::class, 'fetch_info'])->name('admin.users.fetch_info');
    });
});
