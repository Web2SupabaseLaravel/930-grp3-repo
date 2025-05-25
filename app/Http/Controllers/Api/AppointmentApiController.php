<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentApiController extends Controller
{
    /**
     * Display a listing of all appointments.
     */
    public function index()
{
    $appointments = Appointment::all();
    return response()->json($appointments);
}
    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'appointment_date' => 'required',
        'appointment_time' => 'required',
        'appointment_id' => 'required',
        'status' => 'required',
        'services_id' => 'nullable',
        'users_id' => 'nullable',
        'patients_id' => 'nullable',
        'notifications_id' => 'nullable',
    ]);

    $appointment = new Appointment();
    $appointment->fill($request->all());
    $appointment->save();

    return response()->json([
        'message' => 'Appointment created successfully!',
        'data' => $appointment
    ], 201);
}

    /**
     * Display the specified appointment.
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json([
                'error' => 'Appointment not found'
            ], 404);
        }

        return response()->json($appointment);
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'status' => 'required',
            'services_id' => 'required',
            'users_id' => 'required',
            'patients_id' => 'required'
        ]);

        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json([
                'error' => 'Appointment not found'
            ], 404);
        }

        $appointment->update($request->all());

        return response()->json([
            'message' => 'Appointment updated successfully!',
            'data' => $appointment
        ]);
    }

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json([
                'error' => 'Appointment not found'
            ], 404);
        }

        $appointment->delete();

        return response()->json([
            'message' => 'Appointment deleted successfully!'
        ]);
    }
}
