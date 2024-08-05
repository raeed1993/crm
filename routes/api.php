<?php


use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('admin')
    ->middleware('auth:api')
    ->group(function () {
        Route::resource('company', AdminCompanyController::class);
    });
