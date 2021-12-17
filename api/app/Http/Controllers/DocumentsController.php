<?php

namespace App\Http\Controllers;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = Documents::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $documents], 200);
    }
    public function show($id)
    {
        try{
            $document = Documents::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $document], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function create(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'title' => 'required|string',
            'path' => 'required|string'
        ]);
        try{
            $document = new Documents;

            $document->title = $request->title;
            $document->path = $request->path;
            $document->archived = false;
    
            $document->save();

            return response()->json(['API_response' => 'Création effectuée'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Création impossible'], 409);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'path' => 'required|string'
        ]);
        try{
            $document = Documents::findOrFail($id);

            $document->title = $request->title;
            $document->path = $request->path;

            $document->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $document], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $document = Documents::findOrFail($id);

            $document->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function archive($id)
    {
        try{
            $document = Documents::findOrFail($id);

            $document->archived = true;
    
            $document->save();

            return response()->json(['API_response' => 'OK', 'API_data' => $document], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
