<?php

use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\CareerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [CareerController::class, 'create'])->name('career.create');
Route::post('/', [CareerController::class, 'store'])->name('career.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminCareerController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{career}', [AdminCareerController::class, 'show'])->name('dashboard.show');
});
