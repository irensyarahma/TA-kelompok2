<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userCount = User::count();
    return view('dashboard', [
        'title' => 'Dashboard',
        'user' => $userCount
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [userController::class, 'index'])->name('datausers');
    Route::post('/users', [userController::class, 'store'])->name('adduser');
    Route::get('/users/{id}/hapus', [userController::class, 'hapus'])->name('delete');
    Route::post('/users/{id}/edit', [userController::class, 'update'])->name('edituser');
});

require __DIR__ . '/auth.php';
