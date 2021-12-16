<?php

namespace App\Http\Controllers;
use App\Models\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::all();

        return response()->json($cities);
    }
    public function show($id)
    {
        $city = Cities::find($id);

        return response()->json($city);
    }
}
