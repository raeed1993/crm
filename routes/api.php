<?php


use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminImportController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('admin')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::resource('company', AdminCompanyController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('task', AdminTaskController::class);

        Route::prefix('company')->group(function () {
            Route::get('list', [AdminCompanyController::class, 'companies']);
        });

        Route::post('import-company', [AdminImportController::class, 'importCompanies']);
        Route::post('import-user', [AdminImportController::class, 'importUsers']);
    });
