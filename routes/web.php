<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\PostController as AdminPostController;
use App\Http\Controllers\Admin\Blog\EditorImageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\EmailSettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingEnquiryController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\BookingEnquiryController as AdminBookingEnquiryController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/tempo-traveller-hire', function () {
    return view('pages.tempo-traveller-hire');
});

Route::get('/bus-hire', function () {
    return view('pages.bus-hire');
});

Route::get('/urbania', function () {
    return view('pages.urbania');
});

Route::get('/faqs', function () {
    return view('pages.faqs');
});

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:contact-form')->name('contact.store');
Route::post('/booking-enquiries', [BookingEnquiryController::class, 'store'])->middleware('throttle:booking-form')->name('booking-enquiries.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{slug}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'create'])->name('login');
        Route::post('/login', [AuthController::class, 'store'])->middleware('throttle:admin-login')->name('login.store');
        Route::get('/forgot-password', [PasswordResetController::class, 'requestForm'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetController::class, 'sendLink'])->middleware('throttle:5,1')->name('password.email');
        Route::get('/reset-password/{token}', [PasswordResetController::class, 'resetForm'])->name('password.reset');
        Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', fn () => view('admin.dashboard', [
            'recentPosts' => \App\Models\BlogPost::with('category')->latest('updated_at')->take(3)->get(),
            'emailTest' => \App\Models\EmailLog::latest()->first(),
            'emailConfigured' => \App\Models\Setting::where('key', 'mail_host')->whereNotNull('value')->exists(),
            'unreadCount' => \App\Models\ContactSubmission::unread()->count(),
            'recentContacts' => \App\Models\ContactSubmission::latest()->take(3)->get(),
        ]))->name('dashboard');
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/settings/email', [EmailSettingsController::class, 'edit'])->name('settings.email.edit');
        Route::put('/settings/email', [EmailSettingsController::class, 'update'])->name('settings.email.update');
        Route::post('/settings/email/test', [EmailSettingsController::class, 'sendTest'])->middleware('throttle:3,1')->name('settings.email.test');
        Route::get('/contacts/export', [ContactSubmissionController::class, 'export'])->name('contacts.export');
        Route::post('/contacts/bulk-delete', [ContactSubmissionController::class, 'bulkDestroy'])->name('contacts.bulk-destroy');
        Route::get('/contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{submission}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{submission}/read', [ContactSubmissionController::class, 'toggleRead'])->name('contacts.toggle-read');
        Route::post('/contacts/{submission}/resend', [ContactSubmissionController::class, 'resend'])->name('contacts.resend');
        Route::delete('/contacts/{submission}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
        Route::get('/booking-enquiries/export', [AdminBookingEnquiryController::class, 'export'])->name('booking-enquiries.export');
        Route::post('/booking-enquiries/bulk-delete', [AdminBookingEnquiryController::class, 'bulkDestroy'])->name('booking-enquiries.bulk-destroy');
        Route::get('/booking-enquiries', [AdminBookingEnquiryController::class, 'index'])->name('booking-enquiries.index');
        Route::get('/booking-enquiries/{bookingEnquiry}', [AdminBookingEnquiryController::class, 'show'])->name('booking-enquiries.show');
        Route::patch('/booking-enquiries/{bookingEnquiry}/status', [AdminBookingEnquiryController::class, 'updateStatus'])->name('booking-enquiries.update-status');
        Route::post('/booking-enquiries/{bookingEnquiry}/resend', [AdminBookingEnquiryController::class, 'resend'])->name('booking-enquiries.resend');
        Route::delete('/booking-enquiries/{bookingEnquiry}', [AdminBookingEnquiryController::class, 'destroy'])->name('booking-enquiries.destroy');
        Route::get('/blog', [AdminPostController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [AdminPostController::class, 'create'])->name('blog.create');
        Route::post('/blog', [AdminPostController::class, 'store'])->name('blog.store');
        Route::post('/blog/bulk-delete', [AdminPostController::class, 'bulkDestroy'])->name('blog.bulk-destroy');
        Route::post('/blog/{post}/toggle-publish', [AdminPostController::class, 'togglePublish'])->name('blog.toggle-publish');
        Route::post('/blog/editor-image', EditorImageController::class)->name('blog.editor-image');
        Route::get('/blog/{post}/edit', [AdminPostController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{post}', [AdminPostController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{post}', [AdminPostController::class, 'destroy'])->name('blog.destroy');
        Route::get('/blog-categories', [CategoryController::class, 'index'])->name('blog-categories.index');
        Route::post('/blog-categories', [CategoryController::class, 'store'])->name('blog-categories.store');
        Route::put('/blog-categories/{category}', [CategoryController::class, 'update'])->name('blog-categories.update');
        Route::delete('/blog-categories/{category}', [CategoryController::class, 'destroy'])->name('blog-categories.destroy');
    });
});
