<?php

use App\Http\Controllers\{AdminController, DashboardController, PermissionController, RoleController, UserController, WebsiteController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, "index"])->name("home");
Route::get('/about', [WebsiteController::class, "about"])->name("about");
Route::get('/blogs', [WebsiteController::class, "blogs"])->name("blogs");
Route::get('/contact', [WebsiteController::class, "contact"])->name("contact");


Route::get("dashboard", [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', "role:Admin"])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource("/roles", RoleController::class);
    Route::resource("/permissions", PermissionController::class);
    Route::resource("users", UserController::class);
});

require __DIR__.'/auth.php';
