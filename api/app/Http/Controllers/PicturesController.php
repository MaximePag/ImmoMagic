<?php

namespace App\Http\Controllers;
use App\Models\Pictures;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    public function index()
    {
        $pictures = Pictures::all();

        return response()->json($pictures);
    }
    public function show($id)
    {
        $picture = Pictures::find($id);

        return response()->json($picture);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'path' => 'required|string'
        ]);

        $picture = new Pictures;

        $picture->path = $request->path;

        $picture->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'path' => 'required|string'
        ]);

        $picture = Pictures::find($id);

        $picture->path = $request->path;

        $picture->save();

        return response()->json($picture);
    }
    public function delete($id)
    {
        $picture = Pictures::find($id);

        $picture->delete();

        return response()->json('à plus dans l\'bus');
    }
}
