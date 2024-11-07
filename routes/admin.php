<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    return view('admin.auth.login');
})->name('admin.login');

Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);

Route::group(['middleware' => ['web', 'auth', 'admin']], function () {
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');

    Route::get('', function () {
        return view('admin.dashboard');
    });
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Router Category
    Route::group([], function () {
        Route::resource('categories', \App\Http\Controllers\Admin\Category\CategoryController::class, ["as"=>"admin"]);
    });
    // Router User
    Route::group([], function () {
        Route::resource('user', \App\Http\Controllers\Admin\User\UserController::class, array("as"=>"admin"));
        Route::get('user-wallet-history', [\App\Http\Controllers\Admin\User\UserController::class, 'walletHistory'])->name('admin.user.wallet_history');
        Route::get('decentralization', [\App\Http\Controllers\Admin\User\UserController::class, 'decentralization'])->name('admin.user.decentralization');
        Route::post('decentralization', [\App\Http\Controllers\Admin\User\UserController::class, 'decentralization'])->name('admin.user.update.permissions');
    });

    // Router Blogs
    Route::group([], function () {
        Route::resource('blogs', \App\Http\Controllers\Admin\Blog\BlogController::class, array("as"=>"admin"));
    });

    // Router slide
    Route::group([], function () {
        Route::resource('slides', \App\Http\Controllers\Admin\Slide\SlideController::class, array("as"=>"admin"));
    });

    // Router Stores
    Route::group([], function () {
        Route::resource('stores', \App\Http\Controllers\Admin\Store\StoreController::class, array("as"=>"admin"));
    });

    // Router Permissions
    Route::group([], function () {
        Route::resource('permissions', \App\Http\Controllers\Admin\Permission\PermissionController::class, array("as"=>"admin"));
    });
});
