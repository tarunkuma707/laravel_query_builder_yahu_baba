<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NewuserController::class,'showNewusers']);

Route::get('/user/{id}', [NewuserController::class,'singleUser'])->name('view.singleUser');

Route::get('/adduser', [NewuserController::class,'addUser'])->name('view.addUser');

Route::get('/updateuser', [NewuserController::class,'updateUser'])->name('view.addUser');