<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostStorieController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\socialteController;
use App\Http\Controllers\StorieController;
use App\Http\Controllers\userContoller;
use Illuminate\Support\Facades\Route;

Route::get('/stories', [StorieController::class, 'allStories'])->name("stories");


Route::delete('/stories/{id}', [StorieController::class, 'destroy'])->name("delete");


Route::put('/edit/{id}', [StorieController::class, 'edit'])->name("edit");
Route::get('/stories/{id}', [StorieController::class, 'editView']);
Route::get('/questions/{id}', [StorieController::class, 'questionId']);




Route::post('/post', [PostStorieController::class, 'PostStory'])->name("create")->middleware("auth");
Route::get('/post', [PostStorieController::class, 'FormStory'])->middleware("auth");

Route::post('/register', [AuthenticateController::class, 'register'])->name("register");
Route::get('/register', [AuthenticateController::class, 'registerPage']);
Route::get('/', [AuthenticateController::class, 'loginPage']);
Route::post('/', [AuthenticateController::class, 'login'])->name("login");
Route::get('/logout', [AuthenticateController::class, 'logout'])->name("logout");

Route::get('/profil', [ProfilController::class, 'profil'])->middleware("auth")->name("profil");
Route::get('/comment/{id}', [CommentController::class, 'getStory'])->middleware("auth");
Route::post('/comment/{id}', [CommentController::class, 'addComment'])->middleware("auth")->name("comment");
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware("admin");
Route::get('/allComments', [CommentController::class, 'allComment']);
Route::get('/categorie/web', [CategoryController::class, 'webQuestions']);
Route::get('/categorie/android', [CategoryController::class, 'andQuestions']);
Route::get('/categorie/databases', [CategoryController::class, 'dbQuestions']);
Route::get('/categorie/operting-system', [CategoryController::class, 'osQuestions']);
Route::get('/categorie/others', [CategoryController::class, 'otherQuestions']);
Route::post('/profil', [ProfilController::class, 'addImage']);





// Route::get('auth/google', [socialteController::class, 'redrectToGoogle']);
// Route::get('auth/google/callback', [socialteController::class, 'handleGoogleCallback']);


// Route::get('/auth/google', [socialteController::class, 'redrectToGoogle']);
// Route::get('/auth/google/callback', [socialteController::class, 'handelGoogleCallback']);
// Route::post('/profil', [ProfilController::class, 'addImage']);

Route::get('/home', function (){
    return view("home");
});
// Route::fallback(function () {
//     return view('404');
// });



// Route::get('google',function(){

//     Return view('googleAuth');

// });


// Route::get('/auth/google', [socialteController::class, 'redirectToGoogle']);
// Route::get('/auth/google/callback', [socialteController::class, 'handleGoogleCallback']);

// Route::get('auth/google', 'AuthLoginController@redirectToGoogle');

// Route::get('auth/google/callback', 'AuthLoginController@handleGoogleCallback');
