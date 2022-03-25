<?php

namespace App\Http\Controllers;

use App\Models\ThingsData;
use App\Http\Requests\ThingsDataRequest;

class ThingsDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('things-data.index', ['things' => ThingsData::orderBy('id')->get()]);
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
    public function store(ThingsDataRequest $request)
    {
        ThingsData::create($request->all());
        return redirect('things_data')->with('status', 'Create Things Data Successfully!');
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
    public function update(ThingsDataRequest $request, $thingsData)
    {
        ThingsData::whereId($thingsData)->update([
            'things_name' => $request->things_name,
            'qty' => $request->qty,
            'price' => $request->price,
            'pay_date' => $request->pay_date,
            'supplier' => $request->supplier,
            'things_status' => $request->things_status,
            'updated_status_date' => $request->updated_status_date,
        ]);
        return redirect('things_data')->with('status', 'The Things Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ThingsData::whereId($id)->delete();
        return redirect('things_data')->with('deleted', 'The Things Successfully Deleted!');
    }
}
