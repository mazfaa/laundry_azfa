<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Http\Requests\OutletRequest;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outlet.index', ['outlets' => Outlet::orderBy('id')->get()]);
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
    public function store(OutletRequest $request)
    {
        Outlet::create($request->all());
        return redirect('outlet')->with('status', 'Create Outlet Successfully!');
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
    public function update(OutletRequest $request, $id)
    {
        Outlet::whereId($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        return redirect('outlet')->with('status', 'Outlet Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Outlet::whereId($id)->delete();
        return redirect('outlet')->with('deleted', 'Outlet Successfully Deleted!');
    }
}
