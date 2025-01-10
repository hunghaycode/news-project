<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactInfo;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ControllerDashboard;
use App\Http\Controllers\Admin\DisplaySettingController;
use App\Http\Controllers\Admin\FooterGridController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SocialController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login/login-handle', [AdminAuthenticationController::class, 'handleLogin'])->name('login-handle');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
    
    //Reset password
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');

    Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset-password.send');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    Route::get('dashboard', [ControllerDashboard::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);

    Route::resource('news', NewsController::class);
    Route::get('toggle-news-status', [NewsController::class, 'statusToggle'])->name('toggle-news-status');


    Route::get('display-settings', [DisplaySettingController::class, 'index'])->name('display-settings');
    Route::put('display-settings', [DisplaySettingController::class, 'update'])->name('display-settings.update');

    Route::get('about', [AboutController::class, 'index'])->name('about.update');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    Route::resource('ad', AdController::class);

    Route::resource('social', SocialController::class);
    Route::get('toggle-social-status', [SocialController::class, 'statusToggle'])->name('toggle-social-status');

    
    Route::get('contact-info', [ContactInfo::class, 'index'])->name('contact-info.index');
    Route::put('contact-info', [ContactInfo::class, 'update'])->name('contact-info.update');

    Route::get('contact',[ ContactMessageController::class,'index'])->name('contact-message');
    Route::post('contact-send-replay', [ContactMessageController::class, 'sendReplay'])->name('contact.send-replay');

    Route::get('footer-info', [FooterInfoController::class, 'index'])->name('footer-info.index');
    Route::put('footer-info', [FooterInfoController::class, 'update'])->name('footer-info.update');

    Route::get('general-setting', [GeneralSettingController::class,'index'])->name('general-setting.index');
    Route::put('general-setting-update',[GeneralSettingController::class,'updateGeneralSetting'])->name('general-setting.update');
    
});
