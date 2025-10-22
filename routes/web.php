<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OnisanController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/history', [PageController::class, 'history'])->name('history');
Route::get('/heroes', [PageController::class, 'heroes'])->name('heroes');
Route::get('/heroes/{hero:slug}', [PageController::class, 'heroDetail'])->name('heroes.show');
Route::get('/onisan', [PageController::class, 'onisan'])->name('onisan');
Route::get('/onisan/{onisan:slug}', [PageController::class, 'onisanDetail'])->name('onisan.show');
Route::get('/progressive-union', [PageController::class, 'progressiveUnion'])->name('progressive-union');
Route::get('/attractions', [PageController::class, 'attractions'])->name('attractions');
Route::get('/isan-day', [PageController::class, 'isanDay'])->name('isan-day');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Policy Pages
Route::get('/policy/privacy', [PolicyController::class, 'privacy'])->name('policy.privacy');
Route::get('/policy/terms', [PolicyController::class, 'terms'])->name('policy.terms');
Route::get('/policy/facebook_callback', [PolicyController::class, 'facebookCallback'])->name('policy.facebook_callback');

// Registration
Route::get('/registration', [RegistrationController::class, 'create'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

// Social Authentication Routes
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

// OTP Verification Routes
Route::get('/verify-otp', [App\Http\Controllers\Auth\RegisteredUserController::class, 'showOTPVerification'])->name('otp.verify');
Route::post('/verify-otp', [App\Http\Controllers\Auth\RegisteredUserController::class, 'verifyOTP'])->name('otp.verify.submit');
Route::post('/resend-otp', [App\Http\Controllers\Auth\RegisteredUserController::class, 'resendOTP'])->name('otp.resend');

// News/Blog
Route::get('/news', [PostController::class, 'index'])->name('news.index');
Route::get('/news/{post:slug}', [PostController::class, 'show'])->name('news.show');

// Forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{category:slug}', [ForumController::class, 'category'])->name('forum.category');
Route::get('/forum/topic/{topic}', [ForumController::class, 'topic'])->name('forum.topic');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Forum - Create/Reply (Authenticated)
    Route::get('/forum/{category:slug}/create', [ForumController::class, 'createTopic'])->name('forum.create-topic');
    Route::post('/forum/{category:slug}/create', [ForumController::class, 'storeTopic'])->name('forum.store-topic');
    Route::post('/forum/topic/{topic}/reply', [ForumController::class, 'storeReply'])->name('forum.store-reply');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Onisans Management
    Route::resource('onisans', OnisanController::class);

    // News & Blog Management
    Route::resource('news', NewsController::class);

    // Heroes Management
    Route::resource('heroes', App\Http\Controllers\Admin\HeroController::class);

    // Pages Management
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);

    // Attractions Management
    Route::resource('attractions', App\Http\Controllers\Admin\AttractionController::class);

    // WhatsApp Groups Management
    Route::resource('whatsapp-groups', App\Http\Controllers\Admin\WhatsAppGroupController::class);

    // Isan Day Celebrations Management
    Route::resource('isan-day-celebrations', App\Http\Controllers\Admin\IsanDayCelebrationController::class);

    // Isan Day Page Images Management
    Route::get('isan-day-page-settings', [App\Http\Controllers\Admin\IsanDayPageSettingsController::class, 'edit'])->name('isan-day-page-settings.edit');
    Route::patch('isan-day-page-settings', [App\Http\Controllers\Admin\IsanDayPageSettingsController::class, 'update'])->name('isan-day-page-settings.update');

    // Users Management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->except(['create', 'store']);

    // Registrations Management
    Route::resource('registrations', App\Http\Controllers\Admin\RegistrationController::class)->only(['index', 'show', 'destroy']);
    Route::post('registrations/{registration}/approve', [App\Http\Controllers\Admin\RegistrationController::class, 'approve'])->name('registrations.approve');
    Route::post('registrations/{registration}/reject', [App\Http\Controllers\Admin\RegistrationController::class, 'reject'])->name('registrations.reject');

    // Site Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('settings.update');

    // Media Library
    Route::get('/media', [App\Http\Controllers\Admin\MediaController::class, 'index'])->name('media.index');
    Route::post('/media/upload', [App\Http\Controllers\Admin\MediaController::class, 'upload'])->name('media.upload');
    Route::post('/media/create-folder', [App\Http\Controllers\Admin\MediaController::class, 'createFolder'])->name('media.create-folder');
    Route::delete('/media', [App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('media.destroy');

    // Legacy Admin Routes (Keep existing functionality)
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Posts Management
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/posts/create', [AdminController::class, 'createPost'])->name('posts.create');
    Route::post('/posts', [AdminController::class, 'storePost'])->name('posts.store');
    Route::get('/posts/{post}/edit', [AdminController::class, 'editPost'])->name('posts.edit');
    Route::patch('/posts/{post}', [AdminController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{post}', [AdminController::class, 'deletePost'])->name('posts.delete');

    // Forum Moderation
    Route::get('/forum', [AdminController::class, 'forum'])->name('forum');
    Route::delete('/forum/topics/{topic}', [AdminController::class, 'deleteTopic'])->name('forum.delete-topic');
    Route::delete('/forum/replies/{reply}', [AdminController::class, 'deleteReply'])->name('forum.delete-reply');
});

require __DIR__.'/auth.php';
