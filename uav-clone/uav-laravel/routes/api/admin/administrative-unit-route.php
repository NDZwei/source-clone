<?php

use App\Http\Controllers\AdministrativeUnitController;
use Illuminate\Support\Facades\Route;


Route::prefix('administrative-unit')->group(function () {
    Route::get('/get-all-province', [AdministrativeUnitController::class, 'getAllProvince']);
    Route::get('/get-all-by-parent/{id}', [AdministrativeUnitController::class, 'getAllByParent']);
    Route::get('/{id}', [AdministrativeUnitController::class, 'getById']);
    Route::post('/save', [AdministrativeUnitController::class, 'save']);
    Route::delete('/{id}', [AdministrativeUnitController::class, 'delete']);
    Route::post('/get-page', [AdministrativeUnitController::class, 'getPage']);
});
