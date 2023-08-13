<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndoregionController extends Controller
{
    public function form()
    {

        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        return view('form', compact('provinces', 'regencies', 'districts', 'villages'));
    }
}
