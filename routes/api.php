<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\SlideController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
Route::post('/tokens/create', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        $token = $user->createToken('token-global');
 
        return ['token' => $token->plainTextToken];
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    
});

// API routes for authenticated users only
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/slides', [SlideController::class, 'getSlides']);
    Route::get('/blogs', [BlogController::class, 'getBlogs']);

});
