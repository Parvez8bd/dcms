<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location\Division;
use App\Models\Location\District;
use App\Models\Location\Upazila;
use App\Models\Location\Union;

class LocationController extends Controller
{
    public function getAllDistrictsFromDivision()
    {
        return District::where('division_id', '=', request()->division_id)->get();
    }

    public function getAllUpazilasFromDistrict()
    {
        return Upazila::where('district_id', '=', request()->district_id)->get();
    }

    public function getAllUnionsFromUpazila()
    {
        return Union::where('upazila_id', '=', request()->upazila_id)->get();
    }
}
