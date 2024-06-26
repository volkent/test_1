<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CDocumentController;

Route::middleware('api')->group(function () {
    Route::put('documents/{id}', [CDocumentController::class, 'editDocument']);
    Route::delete('documents/{id}', [CDocumentController::class, 'delDocument']);
});
    