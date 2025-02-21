<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NewuserController::class,'showNewusers'])->name('userhome');

Route::get('/user/{id}', [NewuserController::class,'singleUser'])->name('view.singleuser');

Route::get('/adduser', [NewuserController::class,'addUser'])->name('view.adduser');

Route::get('/updateuser', [NewuserController::class,'updateUser'])->name('view.updateuser');

Route::get('/deleteuser/{id}', [NewuserController::class,'deleteUser'])->name('view.delete');