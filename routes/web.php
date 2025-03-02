<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LecturersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubscriberController;
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