<?php

namespace App\Http\Controllers;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointments::all();

        return response()->json($appointments);
    }
    public function show($id)
    {
        $appointment = Appointments::find($id);

        return response()->json($appointment);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'notes' => 'string'
        ]);

        $appointment = new Appointments;

        $appointment->dateHour = date('Y-m-d H:i:s');
        $appointment->notes = $request->notes;

        $appointment->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dateHour' => 'required',
            'notes' => 'string'
        ]);

        $appointment = Appointments::find($id);

        $appointment->dateHour = $request->dateHour;
        $appointment->notes = $request->notes;

        $appointment->save();

        return response()->json($appointment);
    }
    public function delete($id)
    {
        $appointment = Appointments::find($id);

        $appointment->delete();

        return response()->json('à plus dans l\'bus');
    }
}
