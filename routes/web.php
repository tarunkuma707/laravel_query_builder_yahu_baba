<?php

use App\Models\Purchaser;
use App\Models\Subscriber;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\NewuserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\LecturersController;
use App\Http\Controllers\PurchaserController;
use App\Http\Controllers\SubscriberController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/alert',function(){
    return view('learnalert');
});

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

Route::get('/register',function(){
    return  view('register');
});

Route::view('login','login')->name('login');

Route::view('/loginpage',[UserController::class,'loginPage'])->name('loginpage');

Route::view('register','register')->name('register');

Route::post('registerSave',[UserController::class,'register'])->name('registerSave');

Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');

Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::resource('books',BookController::class);

// Route::get('dashboard/inner',[UserController::class,'innerPage'])->name('inner')->middleware(['IsUserValid:admin,editor',TestUser::class]);

// Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard')->middleware(['IsUserValid:admin,editor',TestUser::class]);

// Route::get('dashboard/inner',[UserController::class,'innerPage'])->name('inner')->middleware(['auth','IsUserValid:admin']);

// Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard')->middleware(['auth','IsUserValid:admin']);
Route::get('dashboard/inner',[UserController::class,'innerPage'])->name('inner');

Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard');

Route::get('profile/{id}',[UserController::class,'viewProfile'])->name('profile.show');

Route::get('blog/{id}',[UserController::class,'viewBlog'])->name('blog.show');

Route::get('single-blog/{id}',[UserController::class,'updateBlog'])->name('blog.update');

Route::get('/inuser',function(){
    return view('user');
})->name('inuser');

// Route::middleware(['ok-user'])->group(function(){
//     Route::get('dashboard/inner',[UserController::class,'innerPage'])
//     ->name('inner')
//     ->withoutMiddleware([TestUser::class]);

//     Route::get('dashboard',[UserController::class,'dashboardPage'])
//     ->name('dashboard');
// });

Route::get('/session',[SessionController::class,'index']);

Route::get('/store-session',[SessionController::class,'storeSession']);


Route::get('/delete-session',[SessionController::class,'deleteSession']);

Route::get('send-email',[EmailController::class,'sendEmail']);