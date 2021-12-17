<?php

namespace App\Http\Controllers;
use App\Models\Pictures;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    public function index()
    {
        $pictures = Pictures::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $pictures], 200);
    }
    public function show($id)
    {
        try{
            $picture = Pictures::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $picture], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'path' => 'required|string'
        ]);
        try{
            $picture = new Pictures;

            $picture->path = $request->path;
    
            $picture->save();

            return response()->json(['API_response' => 'Création effectuée'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Création impossible'], 409);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'path' => 'required|string'
        ]);
        try{
            $picture = Pictures::findOrFail($id);

            $picture->path = $request->path;

            $picture->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $picture], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $picture = Pictures::findOrFail($id);

            $picture->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
