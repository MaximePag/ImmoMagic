<?php

namespace App\Http\Controllers;
use App\Models\TypeOfContract;
use Illuminate\Http\Request;

class TypeOfContractController extends Controller
{
    public function index()
    {
        $typeOfContract = TypeOfContract::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $typeOfContract], 200);
    }
    public function show($id)
    {
        try{
            $typeOfContract = TypeOfContract::findOrFail($id);

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
            $typeOfContract = new TypeOfContract;

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
            $typeOfContract = TypeOfContract::findOrFail($id);

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
            $typeOfContract = TypeOfContract::findOrFail($id);

            $typeOfContract->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
