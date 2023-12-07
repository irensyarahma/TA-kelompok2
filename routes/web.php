<?php

use App\Http\Controllers\jawabanController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\pertanyaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Models\jawaban;
use App\Models\kategori;
use App\Models\pertanyaan;
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
    $data = kategori::all();
    $tanya = pertanyaan::with('jawab')->get();
    return view('welcome', [
        'data' => $data,
        'tanya' => $tanya,
    ]);
});

Route::get('/dashboard', function () {
    $userCount = User::count();
    $kateoricount = User::count();
    return view('dashboard', [
        'title' => 'Dashboard',
        'user' => $userCount,
        'kategori' => $kateoricount
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //route halaman user
    Route::get('/users', [userController::class, 'index'])->name('datausers');
    Route::post('/users', [userController::class, 'store'])->name('adduser');
    Route::get('/users/{id}/hapus', [userController::class, 'hapus'])->name('delete');
    Route::post('/users/{id}/edit', [userController::class, 'update'])->name('edituser');

    //route halaman kategori
    Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori/add', [kategoriController::class, 'store'])->name('addkategori');
    Route::post('/kategori/{id}/edit', [kategoriController::class, 'update'])->name('editkategori');
    Route::get('/kategori/{id}/hapus', [kategoriController::class, 'hapus'])->name('deletekategori');

    //pertanyaan
    Route::get('/tanya', [pertanyaanController::class, 'index'])->name('tanya');
    Route::post('/tanya/add', [pertanyaanController::class, 'store'])->name('addtanya');
    Route::get('/tanya/{id}/hapus', [pertanyaanController::class, 'hapus'])->name('deletetanya');

    //jawab
    Route::post('/jawab/{id}', [jawabanController::class, 'store'])->name('addJawab');
});

require __DIR__ . '/auth.php';
