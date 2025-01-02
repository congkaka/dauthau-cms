<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BookingConsultingController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ConsultingController;
use App\Http\Controllers\Api\ContactInformationController;
use App\Http\Controllers\Api\DiscussionController;
use App\Http\Controllers\Api\ExpertController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PracticeController;
use App\Http\Controllers\Api\RegulationController;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\TrainingController;
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
    Route::get('/blog/{alias}', [BlogController::class, 'getBlogAlias']);
    Route::get('/blog-related', [BlogController::class, 'getBlogRelated']);
    Route::get('/contact-info', [ContactInformationController::class, 'getContactInformation']);
    Route::get('/experts', [ExpertController::class, 'getExpert']);
    Route::get('/group-experts', [ExpertController::class, 'groupExpert']);
    Route::get('/partners', [PartnerController::class, 'getPartner']);
    Route::get('/training/{alias}', [TrainingController::class, 'getTraining']);
    Route::get('/training/Related/{alias}', [TrainingController::class, 'getTrainingRelated']);
    Route::get('/training', [TrainingController::class, 'getAllTraining']);
    Route::get('/training-up-coming', [TrainingController::class, 'getAllTrainingUpComing']);
    Route::get('/training-with-cate', [TrainingController::class, 'getTrainingWithCate']);

    Route::post('/update-booking', [BookingController::class, 'UpdateBooking']);

    Route::get('/regulation', [RegulationController::class, 'getRegulation']);
    Route::get('/document-type', [RegulationController::class, 'getDocumentType']);
    Route::get('/validity-type', [RegulationController::class, 'getValidityType']);


    Route::get('/discussions', [DiscussionController::class, 'getDiscussions']);
    Route::post('/discussion/add', [DiscussionController::class, 'addDiscussion']);
    Route::get('/discussion/{id}', [DiscussionController::class, 'getDiscussionDetails']);

    Route::post('/comment/add', [CommentController::class, 'addComment']);

    Route::get('/practices', [PracticeController::class, 'getAll']);
    Route::post('/check-password-practice', [PracticeController::class, 'checkPasswordPractice']);

    Route::get('/consultings', [ConsultingController::class, 'getAll']);
    Route::get('/consulting/{alias}', [ConsultingController::class, 'getConsultingDetails']);

    Route::post('/booking-consulting', [BookingConsultingController::class, 'create']);

});
