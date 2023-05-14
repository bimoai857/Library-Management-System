<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('loginView');
});

//******************* Login Routes *******************
Route::view('/loginView','loginView');
Route::post('/loginUser',[UserController::class,'loginUser']);

//******************* Registration Routes *******************
Route::view('/registrationView','registrationView');
Route::post('/registerUser',[UserController::class,'registerUser']);

//******************* Email Verification Route *******************
Route::get('/verify-email/{token}',[UserController::class,'emailVerification']);


//******************* Logout Route *******************
Route::get('/logout',[UserController::class,'logout']);

//******************* Forgot Password Routes *******************
Route::view('/forgotPasswordView','forgotPasswordView');
Route::post('/fpEmailVerification',[UserController::class,'fpEmailVerification']);
Route::view('/reset-password-view/{id}','passwordResetView');
Route::post('/resetPassword',[UserController::class,'resetPassword']);

//******************* Admin/User middleware Route *******************
Route::get('/dashboard',function(){
    return view('user.dashboard');
})->middleware('admin');

//******************* Dashboard Routes *******************
Route::view('/userDashboard','user.dashboard');
Route::view('/adminDashboard','admin.dashboard');

//******************* Data Routes *******************
Route::get('/bookInfo',[BookController::class,'bookInfo']);
Route::get('/libraryInfo',[BookController::class,'libraryInfo'])->name('libraryInfo');

//******************* Borrower Routes *******************
Route::get('/borrowers',[UserController::class,'borrowers']);
Route::get('/addBorrower',function(){
    return view('admin.addBorrower');
});
Route::get('/bookInfoAdmin/{id}',[BookController::class,'bookInfoAdmin']);

//******************* Library Routes *******************
Route::get('/addBookView',function(){
    return view('admin.addBook');
});
Route::post('/addBook',[BookController::class,'addBook']);
//******************* Book Route *******************
Route::post('/addBorrower',[BookController::class,'addBorrower']);

