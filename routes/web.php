<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Translation;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TranslateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $translations = Translation::all()->sortByDesc('updated_at')->take(10);
    return view('welcome', ['translations' => $translations]);
});

// Add Translation Page
Route::get('/edit_translate', [TranslateController::class, 'index']);

// Edit Translation Page
Route::get('/edit_translate/{id}', [TranslateController::class, 'edit'])->name('edit_translation');

// Add translation to bd
Route::post('/addtranslate',[TranslateController::class, 'store']);

// Show Translation Page
Route::get('/translate/{id}',[TranslateController::class, 'show'])->name('translate');

// Update translation
Route::post('/updatetranslate',[TranslateController::class, 'update']);

//Show login page
Route::get('/login', [SessionController::class, 'create'])->name('login');
//Show register page
Route::get('/register', [UserController::class, 'register']);

// Update translation
Route::post('/signup',[UserController::class, 'store']);
// Login user
Route::post('/login',[SessionController::class, 'store']);
//Logout user
Route::get('/logout', [SessionController::class, 'destroy']);

//Show Edit User page
Route::get('/edit_user', [UserController::class, 'edit']);

//Update user data
Route::patch('/update_user', [UserController::class, 'update']);
