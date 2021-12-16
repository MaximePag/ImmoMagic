<?php

namespace App\Http\Controllers;
use App\Models\TypesOfWaterEvacuation;
use Illuminate\Http\Request;

class TypesOfWaterEvacuationController extends Controller
{
    public function index()
    {
        $typesOfWaterEvacuation = TypesOfWaterEvacuation::all();

        return response()->json($typesOfWaterEvacuation);
    }
    public function show($id)
    {
        $typeOfWaterEvacuation = TypesOfWaterEvacuation::find($id);

        return response()->json($typeOfWaterEvacuation);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $typeOfWaterEvacuation = new TypesOfWaterEvacuation;

        $typeOfWaterEvacuation->name = $request->name;

        $typeOfWaterEvacuation->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $typeOfWaterEvacuation = TypesOfWaterEvacuation::find($id);

        $typeOfWaterEvacuation->name = $request->name;

        $typeOfWaterEvacuation->save();

        return response()->json($typeOfWaterEvacuation);
    }
    public function delete($id)
    {
        $typeOfWaterEvacuation = TypesOfWaterEvacuation::find($id);

        $typeOfWaterEvacuation->delete();

        return response()->json('à plus dans l\'bus');
    }
}
