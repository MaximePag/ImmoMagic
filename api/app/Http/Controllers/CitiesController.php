<?php

namespace App\Http\Controllers;
use App\Models\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $cities], 200);
    }
    public function show($id)
    {
        try{
            $city = Cities::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $city], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
