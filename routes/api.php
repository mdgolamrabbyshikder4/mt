<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderclient;


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
// Route::get('client/order/count/{id}', [App\Http\Controllers\orderclient::class, 'count_order']);
// Route::get('client/order/notif', [App\Http\Controllers\orderclient::class, 'notif_order']);
Route::get('/client/order/count', [orderclient::class, 'notif_order']);
});
