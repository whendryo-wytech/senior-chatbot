<?php

use App\Http\Controllers\Conversation\ConversationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('user')->group(callback: function () {
        Route::get('/', function (Request $request) {
            return response()->json([
                'data'  => $request->user(),
                'error' => false
            ]);
        });
    });
});

Route::prefix('conversation')->group(callback: function () {
    Route::post('/', [ConversationController::class, 'store'])
        ->name('conversation.store.post');
});
