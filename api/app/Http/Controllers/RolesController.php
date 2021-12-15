<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();

        return response()->json($roles);
    }
    public function show($id)
    {
        $role = Roles::find($id);

        return response()->json($role);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $role = new Roles;

        $role->name = $request->name;

        $role->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $role = Roles::find($id);

        $role->name = $request->name;

        $role->save();

        return response()->json($role);
    }
    public function delete($id)
    {
        $role = Roles::find($id);

        $role->delete();

        return response()->json('à plus dans l\'bus');
    }
}
