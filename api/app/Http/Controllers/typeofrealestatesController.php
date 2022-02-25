<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\typeofRealEstates;


class typeofRealEstatesController extends Controller
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

        $typeofRealEstates = new typeofRealEstates;
        $typeofRealEstates->name = $request->input('name');

        $typeofRealEstates->save();
    

            //return successful response
            return response()->json(['typeofRealEstates' => $typeofRealEstates, 'message' => 'CREATED'], 201);

     } catch (\Exception $e) {
            //return error message
             return response()->json(['message' => 'typeofRealEstates Registration Failed!'], 409);
         }
    }
    
    public function show($id)
    {
        $typeofRealEstates = typeofRealEstates::find($id);
        return response()->json($typeofRealEstates);
    }

    public function update(Request $request, $id){

        $typeofRealEstates = typeofRealEstates::find($id);

        $typeofRealEstates->name = $request->input('name');

        $typeofRealEstates->save();

        return response()->json($typeofRealEstates);
    }

    public function delete($id)
    {
        $typeofRealEstates = typeofRealEstates::find($id);
        $typeofRealEstates->delete();

        return response()->json('Fiche client supprimé');
    }

}