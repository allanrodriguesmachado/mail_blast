<?php

use App\Http\Controllers\MailListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $login = Auth::loginUsingId(1);
    if ($login) {
        return  view('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/list', [MailListController::class, 'index'])->name('list');
    Route::get('/list/create', [MailListController::class, 'create'])->name('list.create');
    Route::post('/list/store', [MailListController::class, 'store'])->name('list.store');
});

require __DIR__.'/auth.php';
