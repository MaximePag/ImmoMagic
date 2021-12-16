<?php

namespace App\Http\Controllers;
use App\Models\TypesOfContract;
use Illuminate\Http\Request;

class TypesOfContractController extends Controller
{
    public function index()
    {
        $typesOfContract = TypesOfContract::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $typesOfContract], 200);
    }
    public function show($id)
    {
        try{
            $typeOfContract = TypesOfContract::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $typeOfContract], 200);
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
            $typeOfContract = new TypesOfContract;

            $typeOfContract->name = $request->name;
    
            $typeOfContract->save();

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
            $typeOfContract = TypesOfContract::findOrFail($id);

            $typeOfContract->name = $request->name;

            $typeOfContract->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $typeOfContract], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $typeOfContract = TypesOfContract::findOrFail($id);

            $typeOfContract->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
