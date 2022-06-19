<?php

use App\Http\Controllers\APi\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('website/{id}/post', [WebsiteController::class, 'makePost']);
Route::post('website/{id}/subscription', [WebsiteController::class, 'subscribe']);
