<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\typesofrealestates;


class typesofrealestatesController extends Controller
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

        $typesofrealestates = new typesofrealestates;
        $typesofrealestates->name = $request->input('name');

        $typesofrealestates->save();
    

            //return successful response
            return response()->json(['typesofrealestates' => $typesofrealestates, 'message' => 'CREATED'], 201);

     } catch (\Exception $e) {
            //return error message
             return response()->json(['message' => 'typesofrealestates Registration Failed!'], 409);
         }
    }
    
    public function show($id)
    {
        $typesofrealestates = typesofrealestates::find($id);
        return response()->json($typesofrealestates);
    }

    public function update(Request $request, $id){

        $typesofrealestates = typesofrealestates::find($id);

        $typesofrealestates->name = $request->input('name');

        $typesofrealestates->save();

        return response()->json($typesofrealestates);
    }

    public function delete($id)
    {
        $typesofrealestates = typesofrealestates::find($id);
        $typesofrealestates->delete();

        return response()->json('Fiche client supprimé');
    }

}