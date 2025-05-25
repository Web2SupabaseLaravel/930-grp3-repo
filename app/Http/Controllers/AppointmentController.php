<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of all appointments.
     */
   public function index()
{
    $appointments = Appointment::all();
    return view('appointment.index')->with('appointments', $appointments);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['appointment'] = new Appointment();
        $data['route'] = 'appointments.store';
        $data['method'] = 'post';
        $data['titleForm'] = 'Form Input Event';
        $data['submitButton'] = 'Submit';

        return view('appointment.form2', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'appointment_date' => 'required',
        'appointment_time' => 'required',
        'status' => 'required',
        'services_id' => 'required',
        'users_id' => 'required',
        'patients_id' => 'required'
        ]);

        $inputAppointment = new Appointment();
        $inputAppointment->appointment_date = $request->appointment_date;
        $inputAppointment->appointment_time = $request->appointment_time;
        $inputAppointment->status = $request->status;
        $inputAppointment->services_id = $request->services_id;
        $inputAppointment->users_id = $request->users_id;
        $inputAppointment->patients_id = $request->patients_id;
        $inputAppointment->created_at = now();
        $inputAppointment->save();

        return redirect('appointments/create')->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $appointment = Appointment::find($id);

        if(!$appointment){
        return redirect('appointments')->with('error', 'Appointment not found');
       }

        return view('appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       $appointment = Appointment::find($id);

       if(!$appointment){
        return redirect('appointments')->with('error', 'Appointment not found');
       }

        $data['appointment'] = $appointment;
        $data['route'] = ['appointments.update', $id];
        $data['method'] = 'put';
        $data['titleForm'] = 'Update Appointment';
        $data['submitButton'] = 'Update';

        return view('appointment.form2', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'status' => 'required',
            'services_id' => 'required',
            'users_id' => 'required',
            'patients_id' => 'required'
       ]);

        $appointment = Appointment::find($id);
        $appointment->update($request->all());

        return redirect()->with('success', 'Appointment updated successfully!');

    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
      $appointment = Appointment::find($id);

      if (!$appointment) {
        return redirect('appointments')->with('error', 'Appointment not found');
      }

      $appointment->delete();

      return redirect('appointments')->with('success', 'Appointment deleted successfully');
    }
}
