<?php

namespace App\Http\Controllers;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointments::all();

        return response()->json(['API_response' => 'OK', 'API_data' => $appointments], 200);
    }
    public function show($id)
    {
        try{
            $appointment = Appointments::findOrFail($id);

            return response()->json(['API_response' => 'OK', 'API_data' => $appointment], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function create(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'dateHour' => 'required',
            'notes' => 'required|string',
            'id_g5e1D_users' => 'required',
            'id_g5e1D_realEstate' => 'required',
            'id_g5e1D_appointmentsSubjects' => 'required',
            'id_g5e1D_users_agentsCanHaveAppointments' => 'required'
        ]);
        try{
            $appointment = new Appointments;

            $appointment->dateHour = $request->input('dateHour');
            $appointment->notes = $request->input('notes');
            $appointment->id_g5e1D_users = $request->input('id_g5e1D_users');
            $appointment->id_g5e1D_realEstate = $request->input('id_g5e1D_realEstate');
            $appointment->id_g5e1D_appointmentsSubjects = $request->input('id_g5e1D_appointmentsSubjects');
            $appointment->id_g5e1D_users_agentsCanHaveAppointments = $request->input('id_g5e1D_users_agentsCanHaveAppointments');
            $appointment->archived = false;
    
            $appointment->save();

            return response()->json(['API_response' => 'Création effectuée'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Création impossible'], 409);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dateHour' => 'required',
            'notes' => 'required|string',
            'id_g5e1D_users' => 'required',
            'id_g5e1D_realEstate' => 'required',
            'id_g5e1D_appointmentsSubjects' => 'required',
            'id_g5e1D_users_agentsCanHaveAppointments' => 'required'
        ]);
        try{
            $appointment = Appointments::findOrFail($id);

            $appointment->dateHour = $request->input('dateHour');
            $appointment->notes = $request->input('notes');
            $appointment->id_g5e1D_users = $request->input('id_g5e1D_users');
            $appointment->id_g5e1D_realEstate = $request->input('id_g5e1D_realEstate');
            $appointment->id_g5e1D_appointmentsSubjects = $request->input('id_g5e1D_appointmentsSubjects');
            $appointment->id_g5e1D_users_agentsCanHaveAppointments = $request->input('id_g5e1D_users_agentsCanHaveAppointments');

            $appointment->save();

            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $appointment], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function delete($id)
    {
        try{
            $appointment = Appointments::findOrFail($id);

            $appointment->delete();

            return response()->json(['API_response' => 'Suppression effectuée'], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
    public function archive($id)
    {
        try{
            $appointment = Appointments::findOrFail($id);

            $appointment->archived = true;
    
            $appointment->save();

            return response()->json(['API_response' => 'Archivé', 'API_data' => $appointment], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }
}
