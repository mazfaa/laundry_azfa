<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Http\Requests\PickupRequest;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pick-up.index', ['pickups' => Pickup::orderBy('id')->get()]);
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
    public function store(PickupRequest $request)
    {
        Pickup::create($request->all());
        return redirect('pickup')->with('status', 'Create Pickup Successfully!');
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
    public function update(PickupRequest $request, $id)
    {
        Pickup::whereId($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'pickup_officer' => $request->pickup_officer,
            'status' => $request->status,
        ]);
        return redirect('pickup')->with('status', 'Pickup Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pickup::whereId($id)->delete();
        return redirect('pickup')->with('deleted', 'Pickup Successfully Deleted!');
    }
}
