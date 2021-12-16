<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $roles], 200);
    }
    public function show($id)
    {
        try{
            $role = Roles::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $role], 200);
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
            $role = new Roles;

            $role->name = $request->name;
    
            $role->save();

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
            $role = Roles::findOrFail($id);

            $role->name = $request->name;

            $role->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $role], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $role = Roles::findOrFail($id);

            $role->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
