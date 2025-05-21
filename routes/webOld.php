<?php

use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\ClearController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\UserGateService;
use App\Http\Controllers\Admin\Stages\FormController;

use App\Http\Controllers\Admin\Development\UserDataController;

use App\Http\Controllers\Client\HomeController as HomeController;

Route::get('/', [MainController::class, 'index'])->name('index');

Auth::routes();

Route::resource('forms', FormController::class)->middleware('auth');

Route::get('/login', function () {
    return redirect()->route('index')->with('openModal', 'login');
})->name('login');

Route::get('/register', function () {
    return redirect()->route('index')->with('openModal', 'register');
})->name('register');


Route::get(config('constants.HOME'), [HomeController::class, 'index'])
    ->name('home')
    ->middleware('can:access-client-dashboard');
Route::get(config('constants.HOME').'/security', [HomeController::class, 'security'])
    ->name('home.security')
    ->middleware('can:access-client-dashboard');
Route::get(config('constants.HOME').'/stages/{slug}', [HomeController::class, 'stages'])
    ->name('home.stages')
    ->middleware('can:access-client-dashboard');
Route::put(config('constants.HOME').'/stages/stage-update/{user}', [HomeController::class, 'stageUpdate'])
    ->name('home.stageUpdate')
    ->middleware('can:access-client-dashboard');
Route::post(config('constants.HOME').'/stages/user-start-stage', [HomeController::class, 'userStartStage'])
    ->name('home.userStartStage')
    ->middleware('can:access-client-dashboard');

Route::group(['middleware' => 'auth'], function () {

        Route::get('/intro-form', [IntroFormController::class, 'show'])->name('intro.form');
        Route::post('/intro-form', [IntroFormController::class, 'store'])->name('intro.form.submit');

});



Route::get('/artisan', function () {
    try {
        // Artisan::call('session:table');
        Artisan::call('storage:link');
        //Artisan::call('migrate:rollback', ['--step' => 1]);
    } catch (Exception $e) {
        response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/migrate', function () {
    try {
        Artisan::call('migrate');
    } catch (Exception $e) {
        response()->json(['error' => $e->getMessage()], 500);
    }
});








