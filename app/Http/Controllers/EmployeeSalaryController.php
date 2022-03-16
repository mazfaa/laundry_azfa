<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index () {
        return view('employee_salary.index');
    }
}
