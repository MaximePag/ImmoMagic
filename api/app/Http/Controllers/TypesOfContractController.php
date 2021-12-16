<?php

namespace App\Http\Controllers;
use App\Models\TypesOfContract;
use Illuminate\Http\Request;

class TypesOfContractController extends Controller
{
    public function index()
    {
        $typesOfContract = TypesOfContract::all();

        return response()->json($typesOfContract);
    }
    public function show($id)
    {
        $typeOfContract = TypesOfContract::find($id);

        return response()->json($typeOfContract);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $typeOfContract = new TypesOfContract;

        $typeOfContract->name = $request->name;

        $typeOfContract->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $typeOfContract = TypesOfContract::find($id);

        $typeOfContract->name = $request->name;

        $typeOfContract->save();

        return response()->json($typeOfContract);
    }
    public function delete($id)
    {
        $typeOfContract = TypesOfContract::find($id);

        $typeOfContract->delete();

        return response()->json('à plus dans l\'bus');
    }
}
