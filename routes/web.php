<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(NewuserController::class)->group(function(){
    Route::get('/', 'showNewusers')->name('userhome');

    Route::get('/user/{id}','singleUser')->name('view.singleuser');

    Route::post('/adduser', 'addUser')->name('view.adduser');

    Route::post('/updateuser/{id}', 'updateUser')->name('view.updateuser');

    Route::get('/updatepage/{id}', 'updatePage')->name('view.updatepage');

    Route::get('/deleteuser/{id}', 'deleteUser')->name('view.delete');
});


Route::view('newuser','/adduser');