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

        $option = "<option value=''>--Pilih Kabupaten--</option>";

        foreach ($kabupaten as $kab) {
            $option .= "<option value='$kab->id'>$kab->name</option>";
        }

        echo $option;
    }

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatan = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option value=''>--Pilih Kecamatan--</option>";

        foreach ($kecamatan as $kec) {
            $option .= "<option value='$kec->id'>$kec->name</option>";
        }

        echo $option;
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desa = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option value=''>--Pilih Desa--</option>";

        foreach ($desa as $des) {
            $option .= "<option value='$des->id'>$des->name</option>";
        }

        echo $option;
    }
}
