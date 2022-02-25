<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\AppointmentsSubjects;


class AppointmentsSubjectsController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function create(Request $request)
    {
    $this->validate($request, [
        'name' => 'required|string'
    ]);
    try {

        $appointmentssubjects = new AppointmentsSubjects;

        $appointmentssubjects->name = $request->input('name');

        $appointmentssubjects->save();
    
            return response()->json(['API_response' => 'Création effectuée'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Création impossible'], 409);
        }
    }
    
    public function show($id)
    {
        try{
            $appointmentssubjects = AppointmentsSubjects::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $appointmentssubjects], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function update(Request $request, $id){

        try{
            $appointmentssubjects = AppointmentsSubjects::findOrFail($id);

            $appointmentssubjects->name = $request->input('name');

            $appointmentssubjects->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $appointmentssubjects], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        };
    }

    public function delete($id)
    {
        try{
            $appointmentssubjects = AppointmentsSubjects::findOrFail($id);

            $appointmentssubjects->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }

}