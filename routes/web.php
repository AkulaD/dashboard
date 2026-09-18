<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Certificate;
use App\Models\WorkExperience;
use App\Models\Project;
use App\Models\Message;
use App\Models\User;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'storeMessage'])->name('contact.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->get()->groupBy('category');
        $educations = Education::all();
        $certificates = Certificate::orderBy('sort_order')->get();
        $workExperiences = WorkExperience::orderBy('sort_order')->get();
        $projects = Project::orderBy('sort_order')->get();
        $messages = Message::latest()->get();
        $users = User::all();

        return view('dashboard.dashboard', compact(
            'profile',
            'skills',
            'educations',
            'certificates',
            'workExperiences',
            'projects',
            'messages',
            'users'
        ));
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});