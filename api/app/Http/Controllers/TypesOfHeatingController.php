<?php

namespace App\Http\Controllers;
use App\Models\TypesOfHeating;
use Illuminate\Http\Request;

class TypesOfHeatingController extends Controller
{
    public function index()
    {
        $typesOfContract = TypesOfHeating::all();

        return response()->json($typesOfContract);
    }
    public function show($id)
    {
        $typeOfHeating = TypesOfHeating::find($id);

        return response()->json($typeOfHeating);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $typeOfHeating = new TypesOfHeating;

        $typeOfHeating->name = $request->name;

        $typeOfHeating->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $typeOfHeating = TypesOfHeating::find($id);

        $typeOfHeating->name = $request->name;

        $typeOfHeating->save();

        return response()->json($typeOfHeating);
    }
    public function delete($id)
    {
        $typeOfHeating = TypesOfHeating::find($id);

        $typeOfHeating->delete();

        return response()->json('à plus dans l\'bus');
    }
}
