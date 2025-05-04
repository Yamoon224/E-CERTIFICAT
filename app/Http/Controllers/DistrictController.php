<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        $districts = District::orderBy('department_id')->orderBy('city_id')->orderBy('name')->get();
        return view('admin.districts.index', compact('cities', 'districts'));
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
        $data['department_id'] = City::find($data['city_id'])->department_id;
        District::create( $data );
        return back()->with(['status'=>'success', 'message'=>__('locale.add', ['param'=>__('locale.district', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $district = District::find($id);
        return view('district', compact('district'));
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
        $district = District::find($id);

        $data = $request->except('_token');
        $district->update( $data );

        return back()->with(['status'=>'success', 'message'=>__('locale.update', ['param'=>__('locale.city', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        District::find($id)
            ->delete();

        return back()->with(['status'=>'success', 'message'=>__('locale.delete', ['param'=>__('locale.city', ['suffix'=>'', 'prefix'=>''])])]);
    }
}
