<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/world', function () {
    return 'World';
});
Route::get('/selamat', function () {
    return 'selamat Datang';
});
Route::get('/about', function () {
    return 'NIM: 2341720138 Nama: Fauzie Ikhlasul Amnur';
});
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke- ' . $postId . " komentar ke-: " . $commentId;
});
Route::get('/article/{id}', function ($articleId) {
    return 'Halaman article ke-' . $articleId;
});
Route::get('/users/{name?}', function ($name = null) {
    return 'Nama saya ' . $name;
});
Route::get('/user/{name?}', function ($name = 'john') {
    return 'Nama saya ' . $name;
});
Route::get('/hello', [WelcomeController::class, 'hello']);

// Route::get('/index', [PageController::class, 'index']);

// Route::get('/about', [PageController::class, 'about']);

// Route::get('/articles/{id}', [PageController::class, 'articles']);

Route::get('/index', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'about']);

Route::get('/articles/{id}', [ArticleController::class, 'articles']);

Route::resource('photos', PhotoController::class)->only(['index', 'show']);

Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);

// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Fauzie']);
// });

Route::get('/greeting', [WelcomeController::class, 'greeting']);
