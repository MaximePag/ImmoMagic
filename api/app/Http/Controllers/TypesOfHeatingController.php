<?php

namespace App\Http\Controllers;
use App\Models\TypesOfHeating;
use Illuminate\Http\Request;

class TypesOfHeatingController extends Controller
{
    public function index()
    {
        $typesOfHeating = TypesOfHeating::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $typesOfHeating], 200);
    }
    public function show($id)
    {
        try{
            $typeOfHeating = TypesOfHeating::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $typeOfHeating], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        try{
            $typeOfHeating = new TypesOfHeating;

            $typeOfHeating->name = $request->name;
    
            $typeOfHeating->save();

            return response()->json(['API_response' => 'Création effectuée'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Création impossible'], 409);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        try{
            $typeOfHeating = TypesOfHeating::findOrFail($id);

            $typeOfHeating->name = $request->name;

            $typeOfHeating->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $typeOfHeating], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $typeOfHeating = TypesOfHeating::findOrFail($id);

            $typeOfHeating->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
