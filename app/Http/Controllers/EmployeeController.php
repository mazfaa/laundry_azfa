<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index () {
        return view('employee.index', [
            'outlets' => Outlet::all(),
            'employees' => User::orderBy('id')->get(),
        ]);
    }

    public function update(EmployeeRequest $request, $user)
    {
        $request = $request->validate([
            'outlet_id' => ['required'],
            'role' => ['required'],
            'username' => ['required', 'alpha_num', 'min:5', 'max:25'],
            'email' => ['required', 'email'],
            'name' => ['required', 'min:3', 'string'],
        ]);
        User::where('id', $user)->update($request);
        return redirect('employee')->with('status', 'The Employee Successfully Edited!');
    }

    public function destroy($user)
    {
        User::whereId($user)->delete();
        return redirect('employee')->with('deleted', 'The Employee Successfully Deleted!');
    }
}
