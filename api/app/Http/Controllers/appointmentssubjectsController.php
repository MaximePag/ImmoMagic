<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\appointmentssubjects;


class appointmentssubjectsController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function register(Request $request)
    {
    $this->validate($request, [
        'name' => 'required|string'
    ]);

    try {

        $appointmentssubjects = new appointmentssubjects;
        $appointmentssubjects->name = $request->input('name');

        $appointmentssubjects->save();
    

            //return successful response
            return response()->json(['appointmentssubjects' => $appointmentssubjects, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'appointmentssubjects Registration Failed!'], 409);
        }
    }
    
    public function show($id)
    {
        $appointmentssubjects = appointmentssubjects::find($id);
        return response()->json($appointmentssubjects);
    }

    public function update(Request $request, $id){

        $appointmentssubjects = appointmentssubjects::find($id);

        $appointmentssubjects->name = $request->input('name');

        $appointmentssubjects->save();

        return response()->json($appointmentssubjects);
    }

    public function delete($id)
    {
        $appointmentssubjects = appointmentssubjects::find($id);
        $appointmentssubjects->delete();

        return response()->json('Fiche client supprimé');
    }

}