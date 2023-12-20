<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Middleware\UserAuth;

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

Route::get('/',[UserAuthController::class, 'index'])->name('User.login');
//this for Authancation Route
Route::post('login', [UserAuthController::class, 'login'])->name('login');

Route::middleware([UserAuth::class])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('logout' ,[UserAuthController::class , 'logout'])->name('logout');
        Route::get('home', [Admin::class ,'index'])->name('admin.home');
        Route::get('budget', [Admin::class, 'create'])->name('budget.save');
        Route::post('store_budgets', [Admin::class, 'store'])->name('store.budget');
        Route::put('updata-budget{id}', [Admin::class, 'updateBudget'])->name('update.budget');
        Route::get('trash-budget/{id}', [Admin::class, 'trashBudget'])->name('trash.budget');
        Route::get('destroy-budget{id}', [Admin::class , 'destroyBudget'])->name('destroy.budget');
        Route::get('restore-budget{id}', [Admin::class , 'restoreBudget'])->name('restore.budget');
        Route::get('home', [Admin::class, 'home'])->name('admin.home');

        Route::get('trash', [Admin::class, 'trashList'])->name('trash.list');
        Route::get('test',[Admin::class, 'test'])->name('test.save');


        // this the Budget_income
        Route::get('budget_income', [Admin::class , 'budgetIncome'])->name('budgetIncome.save');
        Route::post('store_budgetIncome', [Admin::class, 'storebudgetIncome'])->name('store.budgetIncome');
        Route::put('update-budgetIncome/{id}', [Admin::class, 'updateBudgetIncome'])->name('update.budgetIncome');
        Route::get('destroy-budget_income/{id}', [Admin::class, 'destroyBudgetIncome'])->name('destroy.budgetIncome');

        // this is Budget Type
        Route::get('budgetType', [Admin::class, 'budgetType'])->name('budgetType.save');
        Route::post('store_budgetType',[Admin::class, 'storeBudgetType'])->name('store.budgetType');


        // this is Expence
        Route::get('expenses', [Admin::class, 'Expenses'])->name('show.expenses');
        Route::post('store-Expenses', [Admin::class , 'storeExpenses'])->name('store.Expenses');
        Route::put('updateExpenses\{id}', [Admin::class, 'updateExpenses'])->name('update.Expenses');

        // this is the People Section
        Route::get('showPeople', [Admin::class, 'ShowPeople'])->name('Show.People');
        Route::post('storePeople', [Admin::class, 'StorePeople'])->name('store.people');

    });

});
