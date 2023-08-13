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
        // $regencies = Regency::all();
        // $districts = District::all();
        // $villages = Village::all();
        return view('form', compact('provinces'));
    }

    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupaten = Regency::where('province_id', $id_provinsi)->get();

        foreach ($kabupaten as $kab) {
            echo "<option value='$kab->id'>$kab->name</option>";
        }
    }
}
