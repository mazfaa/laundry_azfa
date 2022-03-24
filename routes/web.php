<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\SimulationThingsTransaction;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('outlet', OutletController::class);
    Route::resource('package', PackageController::class);
    Route::resource('member', MemberController::class);
    Route::resource('inventory', InventoryController::class);
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::put('employee/{user}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('employee/{user}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::resource('transaction', TransactionController::class);
    Route::get('employee_salary', [EmployeeSalaryController::class, 'index'])->name('employee_salary.index');
    Route::resource('pickup', PickupController::class);
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware(['auth', 'role:admin,cashier'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('member', MemberController::class);
    Route::resource('inventory', InventoryController::class);
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::get('simulation_things_transaction', [SimulationThingsTransaction::class, 'index'])->name('simulation_things_transaction.index');
    Route::resource('transaction', TransactionController::class);
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware(['auth', 'role:admin,cashier,owner'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('export/package', [PackageController::class, 'exportData'])->name('export-package');
Route::get('export/salary', [EmployeeSalaryController::class, 'exportData'])->name('export-salary');
