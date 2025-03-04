<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LecturersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaserController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VideoController;
use App\Models\Purchaser;
use App\Models\Subscriber;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(NewuserController::class)->group(function(){
    Route::get('/', 'showNewusers')->name('userhome');

    Route::get('/user/{id}','singleUser')->name('view.singleuser');

    Route::post('/addNewuser', 'addNewUser')->name('view.adduser');

    Route::put('/updateuser/{id}', 'updateUser')->name('view.updateuser');

    Route::get('/updatepage/{id}', 'updatePage')->name('view.updatepage');

    Route::post('/deleteuser/{id}', 'deleteUser')->name('view.delete');

    Route::get('/showusers','showJoinedUsers')->name('view.joinedusers');

    Route::get('/uniondata','uniondata');
    
    Route::get('/whendata','whendata');

    Route::get('/chunkdata','chunkdata');
});


Route::view('/newuser','adduser');

// Route::resource('lecturers',LecturersController::class)->names([
//     'create'=>'lecturers.build',
//     'show'=>'lecturers.view',
// ]);

Route::resource('lecturers',LecturersController::class);

Route::resource('users.comments',CommentsController::class)->shallow();


Route::resource("/subscribers", SubscriberController::class);
//Route::get("/subscriber", [SubscriberController::class,'index']);

Route::resource('student',StudentController::class);

Route::resource('partner',PartnerController::class);

Route::get('/contact',[ContactController::class,'show']);

Route::resource('author', AuthorController::class);

Route::resource('post', PostController::class);

Route::resource('employee', EmployeeController::class);

Route::resource('roles', RoleController::class);

Route::resource('customer',CustomerController::class);

Route::resource('order',OrderController::class);

Route::resource('country',CountryController::class);

Route::resource('reader',ReaderController::class);

//Route::resource('post',PostController::class);

Route::resource('purchaser',PurchaserController::class);

Route::resource('article',ArticleController::class);

Route::resource('image',ImageController::class);

Route::resource('video',VideoController::class);

Route::resource('comment',CommentController::class);

Route::resource('tag',TagController::class);

Route::resource('test',TestController::class);

Route::resource('client',ClientController::class);

Route::resource('provider',ProviderController::class);