<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Certificate;
use App\Models\Department;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome() 
    {
        return view('welcome');
    }

    public function dashboard() 
    {
        $departments = Department::all();
        $areas = Area::all();
        $certificates = Certificate::orderByDesc('id')->where('citizen_id', auth()->user()->citizen->id)->get();
        return auth()->user()->group_id == 6 ? view('home', compact('certificates', 'areas')) : view('admin.dashboard', compact('departments'));
    }
}
