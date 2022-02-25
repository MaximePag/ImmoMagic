<?php

namespace App\Http\Controllers;
use App\Models\Extras;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    public function index()
    {
        $extras = Extras::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $extras], 200);
    }
    public function show($id)
    {
        try{
            $extra = Extras::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $extra], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function create(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        try{
            $extra = new Extras;

            $extra->name = $request->input('name');
    
            $extra->save();

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
            $extra = Extras::findOrFail($id);

            $extra->name = $request->input('name');

            $extra->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $extra], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $extra = Extras::findOrFail($id);

            $extra->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
