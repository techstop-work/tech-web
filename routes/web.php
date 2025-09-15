<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use Livewire\Volt\Volt;

//main routes
Route::get("/", function () {
    return view("main.home");
})->name("home");
Route::view('/services', 'main.services')->name('services');
Route::view('/about', 'main.about')->name('about');
Route::view('/contact', 'main.contact')->name('contact');
Route::view('/pricing', 'main.pricing')->name('pricing');
Route::view('/faqs', 'main.faqs')->name('faqs');
Route::view('/career', 'main.career')->name('career');
Route::view('/404', 'main.404')->name('404');


// admin routes


Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);

    Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('messages', [AdminController::class, 'messages'])->name('admin.messages');
        // Add more admin-protected routes here
    });
});




//user dashboard routes

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

require __DIR__.'/auth.php';
