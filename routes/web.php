<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController ;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\LanguagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;

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

Route::get('/', [Controller::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
})->name('contact.public');

Route::get('/profil', [Controller::class, 'read']);

Route::get('/posts/create', [ContactController::class, 'create'])->name('posts.create');
Route::post('/posts', [ContactController::class, 'store'])->name('posts.store');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\Private\HomeController::class, 'index'])->name('home.index');
Route::get('/home/create', [\App\Http\Controllers\Private\HomeController::class, 'create'])->name('home.create');
Route::post('/home/create', [\App\Http\Controllers\Private\HomeController::class, 'store'])->name('home.store');
Route::get('/home/{home}/edit', [\App\Http\Controllers\Private\HomeController::class, 'edit'])->name('home.edit');
Route::put('/home/{home}/edit', [\App\Http\Controllers\Private\HomeController::class, 'update'])->name('home.update');
Route::delete('/home/{home}/delete', [\App\Http\Controllers\Private\HomeController::class, 'destroy'])->name('home.destroy');       

Route::get('/adminContact', 'ContactController@index')->name('contact');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/send-email', [Controller::class, 'sendEmail'])->name('send.email');

Route::prefix('admin')->group(function () {
    // Experience routes
    Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences/store', [ExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/edit/{id}', [ExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/update/{id}', [ExperienceController::class, 'update'])->name('experiences.update');
    Route::delete('/experiences/destroy/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');

    // Education routes
    Route::get('/educations', [EducationController::class, 'index'])->name('education.index');
    Route::get('/educations/create', [EducationController::class, 'create'])->name('education.create');
    Route::post('/educations/store', [EducationController::class, 'store'])->name('education.store');
    Route::get('/educations/edit/{id}', [EducationController::class, 'edit'])->name('education.edit');
    Route::put('/educations/update/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::delete('/educations/destroy/{id}', [EducationController::class, 'destroy'])->name('education.destroy');

    // Footer routes
    Route::prefix('footers')->group(function () {
        Route::get('/', [FooterController::class, 'index'])->name('footers.index');
        Route::get('/create', [FooterController::class, 'create'])->name('footers.create');
        Route::post('/store', [FooterController::class, 'store'])->name('footers.store');
        Route::get('/edit/{id}', [FooterController::class, 'edit'])->name('footers.edit');
        Route::put('/edit/{id}', [FooterController::class, 'update'])->name('footers.update');
        Route::delete('/destroy/{id}', [FooterController::class, 'destroy'])->name('footers.destroy');

    Route::prefix('skills')->group(function () {
        Route::get('/', [SkillsController::class, 'index'])->name('skills.index');
        Route::get('/create', [SkillsController::class, 'create'])->name('skills.create');
        Route::post('/store', [SkillsController::class, 'store'])->name('skills.store');
        Route::get('/edit/{id}', [SkillsController::class, 'edit'])->name('skills.edit');
        Route::put('/update/{id}', [SkillsController::class, 'update'])->name('skills.update');
        Route::delete('/destroy/{id}', [SkillsController::class, 'destroy'])->name('skills.destroy');

        Route::prefix('languages')->group(function () {
            Route::get('/', [LanguagesController::class, 'index'])->name('languages.index');
            Route::get('/create', [LanguagesController::class, 'create'])->name('languages.create');
            Route::post('/store', [LanguagesController::class, 'store'])->name('languages.store');
            Route::get('/edit/{id}', [LanguagesController::class, 'edit'])->name('languages.edit');
            Route::put('/update/{id}', [LanguagesController::class, 'update'])->name('languages.update');
            Route::delete('/destroy/{id}', [LanguagesController::class, 'destroy'])->name('languages.destroy');
        });
    });
    });
});
