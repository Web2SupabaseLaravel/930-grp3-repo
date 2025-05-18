<?php

namespace App\Http\Controllers;
 use App\Models\Doctors;
 use App\Models\Users_accounts;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
public function index()
{
    $data['doctors'] = \App\Models\Doctors::all()->where('users_id','!=', 'null');
         
        return $data;
}
    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $request->validate([
        
        'medical_field' => 'required',
        'phone' => 'required',
        
]);
    
$inputDoctors = new \App\Models\Doctors();



$inputDoctors->medical_field = $request->medical_field;
$inputDoctors->phone = $request->phone;
$inputDoctors->save();
return redirect ('datadoctors');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $doctor= Doctors::findOrfail($id);
        $doctor=update([$request->all()]);
        return response()->json($doctor,200);

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $doctors = Doctors::findOrFail($id);
        $doctors->delete();
        return response()->json(null,204);
    }
}
