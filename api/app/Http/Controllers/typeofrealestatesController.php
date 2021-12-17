<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\typeofrealestates;


class typeofrealestatesController extends Controller
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

        $typeofrealestates = new typeofrealestates;
        $typeofrealestates->name = $request->input('name');

        $typeofrealestates->save();
    

            //return successful response
            return response()->json(['typeofrealestates' => $typeofrealestates, 'message' => 'CREATED'], 201);

     } catch (\Exception $e) {
            //return error message
             return response()->json(['message' => 'typeofrealestates Registration Failed!'], 409);
         }
    }
    
    public function show($id)
    {
        $typeofrealestates = typeofrealestates::find($id);
        return response()->json($typeofrealestates);
    }

    public function update(Request $request, $id){

        $typeofrealestates = typeofrealestates::find($id);

        $typeofrealestates->name = $request->input('name');

        $typeofrealestates->save();

        return response()->json($typeofrealestates);
    }

    public function delete($id)
    {
        $typeofrealestates = typeofrealestates::find($id);
        $typeofrealestates->delete();

        return response()->json('Fiche client supprimé');
    }

}