<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\InventoryRequest;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.index', ['inventories' => Inventory::orderBy('id')->get()]);
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
    public function store(InventoryRequest $request)
    {
        Inventory::create($request->all());
        return redirect('inventory')->with('status', 'Create Invetory Successfully!');
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
    public function update(InventoryRequest $request, $inventory)
    {
        Inventory::whereId($inventory)->update([
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'qty' => $request->qty,
            'kondisi' => $request->kondisi,
            'tanggal_pengadaan' => $request->tanggal_pengadaan,
        ]);
        return redirect('inventory')->with('status', 'Inventory Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::whereId($id)->delete();
        return redirect('inventory')->with('deleted', 'Inventory Successfully Deleted!');
    }
}
