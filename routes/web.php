<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions');
Route::get('/expertise', [ExpertiseController::class, 'index'])->name('expertise');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/realizations', [App\Http\Controllers\RealizationController::class, 'index'])->name('realizations');
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Client Routes
Route::prefix('client')->name('client.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/projects/{project}', [\App\Http\Controllers\Client\ProjectController::class, 'show'])->name('projects.show');
    Route::resource('invoices', \App\Http\Controllers\Client\InvoiceController::class)->only(['index', 'show']);
    Route::resource('tickets', \App\Http\Controllers\Client\TicketController::class)->only(['index', 'create', 'store']);
});

// Admin Routes (existing)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->middleware('permission:edit_blog');
        Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class)->middleware('permission:edit_projects');
        Route::resource('users', App\Http\Controllers\Admin\UserController::class)->middleware('permission:edit_users');
        
        Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class)->middleware('permission:edit_partners');
        Route::resource('team-members', App\Http\Controllers\Admin\TeamMemberController::class)->middleware('permission:edit_team');
        Route::resource('odoo-modules', App\Http\Controllers\Admin\OdooModuleController::class)->middleware('permission:edit_odoo_modules');
        Route::resource('realizations', App\Http\Controllers\Admin\RealizationController::class)->middleware('permission:edit_realizations');
        Route::resource('media', App\Http\Controllers\Admin\MediaController::class)->except(['show', 'create', 'edit'])->middleware('permission:admin');
        Route::resource('leads', App\Http\Controllers\Admin\LeadController::class)->middleware('permission:admin');
    
        // Support Management
        Route::middleware(['permission:admin'])->group(function () {
            Route::resource('tickets', \App\Http\Controllers\Admin\TicketController::class)->only(['index', 'show']);
            Route::post('tickets/{ticket}/reply', [\App\Http\Controllers\Admin\TicketController::class, 'reply'])->name('tickets.reply');
            
            // Invoices Management
            Route::resource('invoices', \App\Http\Controllers\Admin\InvoiceController::class);

            // Newsletter Management
            Route::get('newsletter/subscribers', [\App\Http\Controllers\Admin\NewsletterController::class, 'subscribers'])->name('newsletter.subscribers');
            Route::post('newsletter/{campaign}/send', [\App\Http\Controllers\Admin\NewsletterController::class, 'send'])->name('newsletter.send');
            Route::resource('newsletter', \App\Http\Controllers\Admin\NewsletterController::class);

            // Pages Management (Landing Pages)
            Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        });
        
        Route::middleware(['permission:edit_contact_info'])->group(function () {
            Route::get('contact-info', [App\Http\Controllers\Admin\ContactInfoController::class, 'index'])->name('contact-info.index');
            Route::post('contact-info', [App\Http\Controllers\Admin\ContactInfoController::class, 'store'])->name('contact-info.store');
            Route::put('contact-info/{contactInfo}', [App\Http\Controllers\Admin\ContactInfoController::class, 'update'])->name('contact-info.update');
            Route::delete('contact-info/{contactInfo}', [App\Http\Controllers\Admin\ContactInfoController::class, 'destroy'])->name('contact-info.destroy');
        });
        
        Route::middleware(['permission:edit_settings'])->group(function () {
            Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
            Route::put('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
            Route::put('settings/social', [App\Http\Controllers\Admin\SettingController::class, 'updateSocial'])->name('settings.social');
            Route::post('settings/logo', [App\Http\Controllers\Admin\SettingController::class, 'updateLogo'])->name('settings.logo');
        });
    });
});



// Language Switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');
