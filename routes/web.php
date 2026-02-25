<?php

use App\Http\Controllers\{CampaignController,
    MailController,
    ProfileController,
    SubscribeController,
    TemplateController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if (Auth::loginUsingId(1)) {
        return view('dashboard');
    }

    return view('mail.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * E-mail
     */
    Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
    Route::get('mail/create', [MailController::class, 'create'])->name('mail.create');
    Route::post('/main/store', [MailController::class, 'store'])->name('mail.store');
    Route::delete('/mail/{mail_id}', [MailController::class, 'destroy'])->name('mail.destroy');
    Route::get('/mail/edit/{mail_id}', [MailController::class, 'show'])->name('mail.edit');
    Route::patch('/mail/{mail_id}', [MailController::class, 'update'])->name('mail.update');

    /**
     * Subscribers
     */
    Route::get('/mail/{mail_id}/subscribers', [SubscribeController::class, 'index'])->name('subscribes.index');
    Route::get('/subscribers/create/{mail_id}', [SubscribeController::class, 'create'])->name('subscribes.create');
    Route::get('/subscriber/{subscribe}', [SubscribeController::class, 'edit'])->name('subscribes.edit');
    Route::match(['put', 'patch'], '/subscriber/{subscribe}', [SubscribeController::class, 'update'])->name('subscribe.update');
    Route::post('/subscriber/store/{mail_id}', [SubscribeController::class, 'store'])->name('subscribes.store');
    Route::delete('/mail/{mail_id}/subscribers/{sub}', [SubscribeController::class, 'destroy'])->name('subscribes.destroy');

    /**
     * Template
     */
    Route::resource('templates', TemplateController::class, ['index', 'create', 'store', 'edit']);

    /**
     * Campaign
     */
    Route::resource('campaigns', CampaignController::class, ['index', 'store']);
    Route::post('campaigns/create/{?tab}', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('campaigns/cancel', [CampaignController::class, 'cancel'])->name('campaigns.cancel');
});

require __DIR__ . '/auth.php';
