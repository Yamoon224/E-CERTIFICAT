<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.certificate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $sector = Area::find($data['area_id']);

        $data['created_by'] = auth()->id();
        $data['expired_at'] = date('Y-m-d');
        $data['district_id'] = $sector->district->id;
        $data['city_id'] = $sector->district->city->id;
        $data['citizen_id'] = auth()->user()->citizen->id;
        $data['department_id'] = $sector->district->city->department->id;

        Certificate::create( $data );
        return back()->with(['message'=>'Demande effectuée avec succès']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $certificate = Certificate::find($id);
        return (new PdfController)->ecertificate($certificate);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
