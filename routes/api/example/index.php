<?php

use App\Http\Controllers\Api\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('example.')->prefix('example')->group(function () {
    Route::get('', [ExampleController::class, 'index'])->name('index');
});
