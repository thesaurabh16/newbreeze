<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ProfileController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [ProfileController::class, 'editUser'])->name('users.edit');
    Route::patch('/users/{user}', [ProfileController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [ProfileController::class, 'deleteUser'])->name('users.delete');
    Route::get('/deleted-users', [ProfileController::class, 'deletedUsers'])->name('users.deleted');
    Route::post('/users-restore/{user}', [ProfileController::class, 'restoreUser'])->name('users.restore1');

});
Route::get('send-email',[EmailController::class,'sendEmail']);
require __DIR__.'/auth.php';
