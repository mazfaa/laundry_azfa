<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulationThingsTransaction extends Controller
{
    public function index () {
        return view('simulation-things-transaction.index');
    }
}
