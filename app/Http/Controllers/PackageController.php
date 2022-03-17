<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Package;
use App\Exports\PackageExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('package.index', [
            'outlets' => Outlet::all(),
            'packages' => Package::orderBy('id')->get(),
        ]);
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
    public function store(PackageRequest $request)
    {
        $request->price = (int)str_replace('.', '', str_replace('Rp. ', '', $request->price));
        Package::create([
            'outlet_id' => $request->outlet_id,
            'type' => $request->type,
            'package_name' => $request->package_name,
            'price' => $request->price,
        ]);
        return redirect('package')->with('status', 'Create Package Successfully!');
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
    public function update(PackageRequest $request, $id)
    {
        $request->price = (int)str_replace('.', '', str_replace('Rp. ', '', $request->price));
        Package::whereId($id)->update([
            'type' => $request->type,
            'outlet_id' => $request->outlet_id,
            'package_name' => $request->package_name,
            'price' => $request->price,
        ]);
        return redirect('package')->with('status', 'Package Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::whereId($id)->delete();
        return redirect('package')->with('deleted', 'Package Successfully Deleted!');
    }

    public function exportData () {
        $date = date('Y-m-d');
        return Excel::download(new PackageExport, $date. '_package.xlsx');
    }
}
