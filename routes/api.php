<?php

use App\Http\Controllers\Api\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/galleries', [GalleryController::class, 'list']);

Route::post('/admin/galleries', [GalleryController::class, 'store']);

Route::post('/contact', [ContactController::class, 'contact']);
