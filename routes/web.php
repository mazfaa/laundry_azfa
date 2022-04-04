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
use App\Http\Controllers\ThingsDataController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AbsenteeismController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\SimulationThingsTransaction;
use App\Http\Controllers\SimulationAccessoriesSalesController;

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
    Route::resource('absenteeism', AbsenteeismController::class);
    Route::post('absenteeism/store', [AbsenteeismController::class, 'updateStatus'])->name('absenteeism.updateStatus');
    Route::post('absenteeism/store_time_finish_work', [AbsenteeismController::class, 'updateTimeFinishWork'])->name('absenteeism.updateTimeFinishWork');
    Route::get('absenteeism_export', [AbsenteeismController::class, 'export'])->name('absenteeism.export');
    Route::post('absenteeism_import', [AbsenteeismController::class, 'import'])->name('absenteeism.import');
    Route::get('outlet_export', [OutletController::class, 'export'])->name('outlet.export');
    Route::post('outlet_import', [OutletController::class, 'import'])->name('outlet.import');
    Route::get('package_export', [PackageController::class, 'export'])->name('package.export');
    Route::post('package_import', [PackageController::class, 'import'])->name('package.import');
    Route::get('member_export', [MemberController::class, 'export'])->name('member.export');
    Route::post('member_import', [MemberController::class, 'import'])->name('member.import');
    Route::get('simulation_accessories_sales', [SimulationAccessoriesSalesController::class, 'index'])->name('simulation_accessories_sales.index');
    Route::resource('pickup', PickupController::class);
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware(['auth', 'role:admin,cashier'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('member', MemberController::class);
    Route::resource('inventory', InventoryController::class);
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::resource('transaction', TransactionController::class);
    Route::resource('things_data', ThingsDataController::class);
    Route::get('simulation_things_transaction', [SimulationThingsTransaction::class, 'index'])->name('simulation_things_transaction.index');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware(['auth', 'role:admin,cashier,owner'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('export/package', [PackageController::class, 'exportData'])->name('export-package');
Route::get('export/salary', [EmployeeSalaryController::class, 'exportData'])->name('export-salary');
