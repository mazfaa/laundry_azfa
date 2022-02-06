<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Package;
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
        return view('package.index', ['packages' => Package::orderBy('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('package.create', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        $request->price = (int)str_replace('.', '', str_replace('Rp. ', '', $request->price));
        // dd($request->all());
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
    public function show(Package $package)
    {
        return view('package.show', ['package' => Package::find($package)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('package.edit', [
            'package' => Package::find($package)->first(),
            'outlets' => Outlet::all(),
        ]);
    }

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
        Package::where('id', $id)->update([
            'type' => $request->type,
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
        Package::where('id', $id)->delete();

        return redirect('package')->with('deleted', 'Package Successfully Deleted!');
    }
}
