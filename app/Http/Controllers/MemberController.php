<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use App\Imports\MemberImport;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index', ['members' => Member::orderBy('id')->get()]);
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
    public function store(MemberRequest $request)
    {
        Member::create($request->all());
        return redirect('member')->with('status', 'Create Member Successfully!');
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
    public function update(MemberRequest $request, $id)
    {
        Member::whereId($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);
        return redirect('member')->with('status', 'Member Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::whereId($id)->delete();
        return redirect('member')->with('deleted', 'Member Successfully Deleted!');
    }

    public function export () {
        $date = date('Y-m-d');
        return Excel::download(new MemberExport, $date . '_Member_laundry.xlsx');
    }

    public function import () {
        Excel::import(new MemberImport, request()->file('file'));
        return back();
    }
}
