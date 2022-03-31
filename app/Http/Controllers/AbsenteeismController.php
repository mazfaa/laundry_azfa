<?php

namespace App\Http\Controllers;

use App\Models\Absenteeism;
use App\Exports\AbsenteeismExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\AbsenteeismRequest;
use App\Imports\AbsenteeismImport;
use Illuminate\Http\Request;

class AbsenteeismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absenteeism.index', ['employees' => Absenteeism::orderBy('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsenteeismRequest $request)
    {
        Absenteeism::create($request->all());
        return redirect('absenteeism')->with('status', 'Create Absenteeism Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbsenteeismRequest $request, $absenteeism)
    {
        Absenteeism::whereId($absenteeism)->update([
            'employee_name' => $request->employee_name,
            'signin_date' => $request->signin_date,
            'signin_time' => $request->signin_time,
            'status' => $request->status,
            'time_to_finish_work' => $request->time_to_finish_work,
        ]);
        return redirect('absenteeism')->with('status', 'The Absenteeism Successfully Edited!');
    }

    public function updateStatus (Request $request) {
        if ($request->status === 'Cuti' || $request->status === 'Sakit') {
            $status = '00:00:00';
        }

        Absenteeism::whereId($request->id)->update([
            'status' => $request->status,
            'time_to_finish_work' => $status ?? '15:00:00',
        ]);
        return redirect('absenteeism')->with('status', 'The Absenteeism Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absenteeism::whereId($id)->delete();
        return redirect('absenteeism')->with('deleted', 'The Absenteeism Successfully Deleted!');
    }

    public function export () {
        $date = date('Y-m-d');
        return Excel::download(new AbsenteeismExport(), $date . '_absensi_kerja.xlsx');
    }

    public function import () {
        Excel::import(new AbsenteeismImport, request()->file('file'));
        return back();
    }
}
