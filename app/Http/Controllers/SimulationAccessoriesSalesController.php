<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulationAccessoriesSalesController extends Controller
{
    public function index () {
        return view('simulation-of-accessories-sales.index');
    }
}
