<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Users_accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorsController extends Controller
{
    
    public function index()
    {
       
        $doctors = Doctors::with('user')->get();

        return response()->json($doctors);
    }




     public function create()
    {
        //

        $data['doctors'] = new \App\Models\Doctors();
              $data['route'] = 'datadoctors.store';
              $data['method'] = 'post';
             # $data['titleForm'] = 'Form Input Event';
              #$data['submitButton'] = 'Submit';
              #return view('event/form_event', $data);
    }


  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_accounts,email',
            'password' => 'required|string|min:6',
            'medical_field' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'working_hours'=>'required'
        ]);

       
        $user = Users_accounts::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'Doctor',
        ]);

      
        Doctors::create([
            'users_id' => $user->user_id, 
            'medical_field' => $validated['medical_field'],
            'phone' => $validated['phone'],
             'working_hours' => $validated['working_hours'],
        ]);

        return response()->json(['message' => 'Doctor created successfully'], 201);
    }

    
    public function update(Request $request, string $id)
    {


         $doctor = Doctors::findOrFail($id);

        
        $user = $doctor->user;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users_accounts,email,' . $user->user_id . ',user_id',
            'password' => 'nullable|string|min:6',
            'medical_field' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
             'working_hours'=>'required'
        ]);

        
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        
        $doctor->medical_field = $validated['medical_field'];
        $doctor->phone = $validated['phone'];
         $doctor->working_hours = $validated['working_hours'];
        
        $doctor->save();

        return response()->json(['message' => 'Doctor updated successfully']);
    }


    public function show($id)
{
    
    $doctor = Doctors::with('user')->findOrFail($id);

    return response()->json($doctor);
}

   
    public function destroy(string $id)
    {
        $doctor = Doctors::findOrFail($id);
        $user = $doctor->user;

        $doctor->delete();
        $user->delete();

        return response()->json(['message' => 'Doctor deleted successfully']);
    }
}
