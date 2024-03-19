<?php

use App\Http\Controllers\Application\ExampleController;
use Illuminate\Support\Facades\Route;

Route::name('example.')->prefix('example')->group(function () {
    Route::get('', [ExampleController::class, 'index'])->name('index');

    Route::post('store', [ExampleController::class, 'store'])->name('store');
    Route::post('upload', [ExampleController::class, 'upload'])->name('upload');
    Route::name('export.')->prefix('export')->group(function () {
        Route::get('excel', [ExampleController::class, 'exportExcel'])->name('excel');
        Route::get('pdf', [ExampleController::class, 'exportPdf'])->name('pdf');
    });
    Route::get('permissions', [ExampleController::class, 'permissions'])->name('permissions');
});

