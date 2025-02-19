<?php

use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PotController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('income_categories', IncomeCategoryController::class);
    Route::resource('periods', PeriodController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('expense_categories', ExpenseCategoryController::class);
    Route::resource('pots', PotController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::get('/expenses/matrix', [ExpenseController::class, 'expensesMatrix'])->name('expenses.matrix');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
