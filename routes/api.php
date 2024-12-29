<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKartuKeluargaController;
use App\Models\DataKartuKeluarga;
use App\Models\AnggotaKeluarga;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('kartu-keluarga', DataKartuKeluargaController::class);

// Route for fetching KartuKeluarga data
Route::get('kartu-keluarga-test-all', function () {
    return DataKartuKeluarga::all();
});
// Route for fetching AnggotaKeluarga data
Route::get('anggota-keluarga-test-all', function () {
    return AnggotaKeluarga::all();
});
