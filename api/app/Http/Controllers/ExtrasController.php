<?php
namespace App\Http\Controllers;

use App\Models\Extras;

class ExtrasController extends Controller
{
    public function index(){
        $extras = Extras::all();
        return response()->json($extras);
    }

    public function show($id){
        $extras = Extra::find($id);
        return response()->json($extras);
    }

    public function create(Request $request){
        $extras = new Extras();

        $extras->name;

        $extras->save();

        return response()->json('Extra Successfully Created');
    }

    public function update(Request $request, $id){
        $extras = Extras::find($id);

        $extras->name = $request->name;

        $extras->save();

        return response()->json($extras);
    }

    public function delete($id){
        $extras = Extras::find($id);
        $extras->delete();

        return response()->json ('Extra successsfully deleted');
    }
}
