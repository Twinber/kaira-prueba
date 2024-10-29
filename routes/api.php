<?php

use App\Http\Controllers\ShortUrlController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('short-urls', ShortUrlController::class);
});
