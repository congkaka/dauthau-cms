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

    // Router Comments
    Route::group([], function () {
        Route::resource('comments', \App\Http\Controllers\Admin\Comment\CommentController::class, ["as"=>"admin"]);
        Route::get('comments/reply', [\App\Http\Controllers\Admin\Comment\CommentController::class, 'replyComment'])->name('admin.comments.replyComment');
        Route::post('reply', [\App\Http\Controllers\Admin\Comment\CommentController::class, 'reply'])->name('admin.comments.reply');
        Route::post('comments/changeStatus', [\App\Http\Controllers\Admin\Comment\CommentController::class, 'changeStatus'])->name('admin.comments.changeStatus');
    });

    // Router Discussions
    Route::group([], function () {
        Route::resource('discussions', \App\Http\Controllers\Admin\Discussion\DiscussionController::class, ["as"=>"admin"]);
        Route::post('discussion/reply', [\App\Http\Controllers\Admin\Discussion\DiscussionController::class, 'reply'])->name('admin.discussions.reply');
        Route::post('discussions/changeStatus', [\App\Http\Controllers\Admin\Discussion\DiscussionController::class, 'changeStatus'])->name('admin.discussions.changeStatus');
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

    // Router expert
    Route::group([], function () {
        Route::resource('expert', \App\Http\Controllers\Admin\Expert\ExpertController::class, array("as"=>"admin"));
    });

    // Router expert
    Route::group([], function () {
        Route::resource('partner', \App\Http\Controllers\Admin\Partner\PartnerController::class, array("as"=>"admin"));
    });

    // Router practice
    Route::group([], function () {
        Route::resource('practice', \App\Http\Controllers\Admin\Practice\PracticeController::class, array("as"=>"admin"));
    });

    // Router Stores
    Route::group([], function () {
        Route::resource('stores', \App\Http\Controllers\Admin\Store\StoreController::class, array("as"=>"admin"));
    });

    // Router Permissions
    Route::group([], function () {
        Route::resource('permissions', \App\Http\Controllers\Admin\Permission\PermissionController::class, array("as"=>"admin"));
    });

    // Router Setting
    Route::group(['prefix' => 'setting'], function () {
        Route::match('get', 'contact', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'contact'])->name('admin.setting.contact');
        Route::match('get', 'telegram', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'telegram'])->name('admin.setting.telegram');
        Route::match('get', 'image', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'image'])->name('admin.setting.image');
        Route::match('get', 'footer', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'footer'])->name('admin.setting.footer');
        Route::match('get', 'info', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'info'])->name('admin.setting.info');
        Route::match('get', 'menu', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'menu'])->name('admin.setting.menu');
        Route::match('post', 'update', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'updateSiteSetting'])->name('admin.setting.update');
        Route::match(['get'], 'bank', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'bank'])->name('admin.setting.pay');
    });

    // Router training
    Route::group([], function () {
        Route::resource('training', \App\Http\Controllers\Admin\Training\TrainingController::class, array("as"=>"admin"));
    });

    // Router booking
    Route::group([], function () {
        Route::get('booking/export', [\App\Http\Controllers\Admin\Booking\BookingController::class, 'export'])->name('admin.booking.export');
        Route::resource('booking', \App\Http\Controllers\Admin\Booking\BookingController::class, array("as"=>"admin"));
    });

    // Router consulting
    Route::group([], function () {
        Route::resource('consulting', \App\Http\Controllers\Admin\Consulting\ConsultingController::class, array("as"=>"admin"));
    });

    // Router booking consulting
    Route::group([], function () {
        Route::resource('booking-consulting', \App\Http\Controllers\Admin\BookingConsulting\BookingConsultingController::class, array("as"=>"admin"));
    });

    // Router Regulation
    Route::group([], function () {
        Route::resource('regulation', \App\Http\Controllers\Admin\Regulation\RegulationController::class, array("as"=>"admin"));
    });
});
