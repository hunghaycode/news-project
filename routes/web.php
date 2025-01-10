<?php

use App\Http\Controllers\Admin\ControllerDashboard;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[HomeController::class,'index' ],function() {
   
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('home/', [HomeController::class, 'index'])->name('home');
Route::get('search-blog-list',[HomeController::class,'searchList'])->name('search-blog-list');
Route::get('news-detail/{slug}', [HomeController::class, 'newDetail'])->name('news-detail');
Route::get('news/archive/{year}/{month}', [HomeController::class, 'archiveDetail'])->name('news.archive');


Route::post('news-comment', [HomeController::class, 'comment'])->name('news-comment');
Route::post('news-comment-reply', [HomeController::class, 'commentReply'])->name('news-comment-reply');
Route::delete('news-comment-destroy', [HomeController::class, 'commentDestroy'])->name('news-comment-destroy');

Route::get('news-about', [HomeController::class, 'newsAbout'])->name('news-about');

Route::get('contact',[HomeController::class,'contact'])->name('contact');
Route::post('contact',[HomeController::class,'handleContactForm'])->name('contact.submit');





// Route::get('auth/login', [HomeController::class, 'login'])->name('user.login');
// Route::get('auth/for-got-password', [HomeController::class, 'resetPassword'])->name('user.for-got-password');
// Route::get('auth/register', [HomeController::class, 'register'])->name('user.register');
// Route::get('news/detail', [HomeController::class, 'newDetail'])->name('news.detail');
// Route::get('admin/dashboard', [HomeController::class, 'adminDashBoard'])->name('admin.dashboard');
// Route::get('admin/news', [HomeController::class, 'adminNews'])->name('admin.news');
// Route::get('admin/news-create', [HomeController::class, 'adminNewsCreate'])->name('admin.news-create');
// Route::get('admin/news-edit', [HomeController::class, 'adminNewsEdit'])->name('admin.news-edit');
require __DIR__.'/auth.php';
