<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
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

        Department::create( $data );
        return back()->with(['status'=>'success', 'message'=>__('locale.add', ['param'=>__('locale.department', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);
        return view('department', compact('department'));
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
        $department = Department::find($id);

        $data = $request->except('_token');
        $department->update( $data );

        return back()->with(['status'=>'success', 'message'=>__('locale.update', ['param'=>__('locale.department', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::find($id)
            ->delete();

        return back()->with(['status'=>'success', 'message'=>__('locale.delete', ['param'=>__('locale.department', ['suffix'=>'', 'prefix'=>''])])]);
    }
}
