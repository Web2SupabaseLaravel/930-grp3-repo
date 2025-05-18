<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $services = Service::all();
    return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
       
        $data['route'] = 'dataservice.store'; 
        $data['method'] = 'post';
        return view('services.form_service', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $request->validate([
        'service_id' => 'required',
        'doctors_id' => 'required', 
        'service_name' => 'required', 
        'description' => 'required', 
        'fees' => 'required',
        'duration' => 'required',
    ]);

    $service = new \App\Models\Service(); 
    $service->service_id = $request->service_id;
    $service->doctors_id = $request->doctors_id;  
    $service->service_name = $request->service_name; 
    $service->description = $request->description; 
    $service->fees = $request->fees; 
    $service->duration = $request->duration; 
    $service->save();
    return redirect('dataservice/create')-> with('success', 'Added successfully'); 

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
         $service = \App\Models\Service::find($id);
        if (!$service) {
        return redirect('dataservice')->with('error', 'Service not found');
        }

       $data['service'] = $service;
       $data['route'] = ['dataservice.update', $service->service_id]; 
       $data['method'] = 'put';

       return view('services.form_service', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'service_id' => 'required',
            'doctors_id' => 'required', 
            'service_name' => 'required', 
            'description' => 'required', 
            'fees' => 'required',
            'duration' => 'required',
        ]);

        $service = Service::findOrFail($id);
        $service->service_id = $request->service_id;
        $service->doctors_id = $request->doctors_id;  
        $service->service_name = $request->service_name; 
        $service->description = $request->description; 
        $service->fees = $request->fees; 
        $service->duration = $request->duration; 
        $service->save();

        return redirect()->route('dataservice.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('dataservice.index')->with('success', 'Deleted successfully');
    }
}
