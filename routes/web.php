<?php

use App\Http\Controllers\Site\MainController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\UserGateService;
use App\Http\Controllers\Admin\Stages\FormController;
use App\Http\Controllers\Client\IntroFormController;
use App\Http\Controllers\Client\CancelController;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])
    ->name('home');
    Route::get('home/security', [HomeController::class, 'security'])
        ->name('home.security');
    Route::get('home/stages/{slug}', [HomeController::class, 'stages'])
        ->name('home.stages');
    Route::put('home/stages/stage-update/{user}', [HomeController::class, 'stageUpdate'])
        ->name('home.stageUpdate');
    Route::post('home/stages/user-start-stage', [HomeController::class, 'userStartStage'])
    ->name('home.userStartStage');
        //new
        Route::get('/intro-form', [IntroFormController::class, 'show'])->name('intro.form');
        Route::post('/intro-form', [IntroFormController::class, 'store'])->name('intro.form.submit');
        Route::post('/cancel', [CancelController::class, 'store'])->name('cancel.store');
        Route::post('/cancel/{id}/read', [CancelController::class, 'markAsRead']);

});
    require __DIR__.'/admin.php';


    Route::get('/migrate', function () {
        try {
            Artisan::call('migrate');
        } catch (Exception $e) {
            response()->json(['error' => $e->getMessage()], 500);
        }
    });
//storage link
    Route::get('/storage-link', function () {
        try {
            Artisan::call('storage:link');
        } catch (Exception $e) {
            response()->json(['error' => $e->getMessage()], 500);
        }
    });



