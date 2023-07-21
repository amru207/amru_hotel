<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\PengunjungController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\KamarController;

Route::get('kamar', [KamarController::class, 'index']);
Route::get('kamar/{id}', [KamarController::class, 'show']);

Route::get('pengunjung', [PengunjungController::class, 'index']);
Route::get('pengunjung/{id}', [PengunjungController::class, 'show']);

Route::get('booking', [BookingController::class, 'index']);
Route::get('booking/{id}', [BookingController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('kamar', [KamarController::class, 'store']);
    Route::delete('kamar/{id}', [KamarController::class, 'destroy']);
    Route::put('kamar/{id}', [KamarController::class, 'update']);

    Route::post('pengunjung', [PengunjungController::class, 'store']);
    Route::delete('pengunjung/{id}', [PengunjungController::class, 'destroy']);
    Route::put('pengunjung/{id}', [PengunjungController::class, 'update']);

    Route::post('booking', [BookingController::class, 'store']);
    Route::delete('booking/{id}', [BookingController::class, 'destroy']);
    Route::put('booking/{id}', [BookingController::class, 'update']);
});

Route::post('/register', [AuthController::class, 'registrasi']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
