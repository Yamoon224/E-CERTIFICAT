<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Department;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        $departments = Department::all();
        return view('admin.cities.index', compact('cities', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        City::create( $data );
        return back()->with(['status'=>'success', 'message'=>__('locale.add', ['param'=>__('locale.city', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);
        return view('city', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city = City::find($id);

        $data = $request->except('_token');
        $city->update( $data );

        return back()->with(['status'=>'success', 'message'=>__('locale.update', ['param'=>__('locale.city', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        City::find($id)
            ->delete();

        return back()->with(['status'=>'success', 'message'=>__('locale.delete', ['param'=>__('locale.city', ['suffix'=>'', 'prefix'=>''])])]);
    }
}
