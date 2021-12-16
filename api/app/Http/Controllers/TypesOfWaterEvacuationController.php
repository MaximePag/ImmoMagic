<?php

namespace App\Http\Controllers;
use App\Models\TypesOfWaterEvacuation;
use Illuminate\Http\Request;

class TypesOfWaterEvacuationController extends Controller
{
    public function index()
    {
        $typesOfWaterEvacuation = TypesOfWaterEvacuation::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $typesOfWaterEvacuation], 200);
    }
    public function show($id)
    {
        try{
            $typeOfWaterEvacuation = TypesOfWaterEvacuation::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $typeOfWaterEvacuation], 200);
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
            $typeOfWaterEvacuation = new TypesOfWaterEvacuation;

            $typeOfWaterEvacuation->name = $request->name;
    
            $typeOfWaterEvacuation->save();

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
            $typeOfWaterEvacuation = TypesOfWaterEvacuation::findOrFail($id);

            $typeOfWaterEvacuation->name = $request->name;

            $typeOfWaterEvacuation->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $typeOfWaterEvacuation], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $typeOfWaterEvacuation = TypesOfWaterEvacuation::findOrFail($id);

            $typeOfWaterEvacuation->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
