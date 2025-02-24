<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LecturersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;
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


//Route::resource("/subscribers", SubscriberController::class);
Route::get("/subscriber",[SubscriberController::class,'index']);