<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PatientController extends Controller
{
    private string $supabaseUrl;
    private string $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = config('services.supabase.url') . '/rest/v1';
        $this->supabaseKey = config('services.supabase.key');
    }

    public function create()
    {
        return view('patients.form');
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Content-Type' => 'application/json',
            'Prefer' => 'return=minimal'
        ])->post($this->supabaseUrl . '/patients', [
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'users_id' => $request->users_id
        ]);

        return $response->successful()
            ? redirect()->route('patient.index')->with('success', '✅ تمت الإضافة بنجاح')
            : redirect()->back()->with('error', '❌ فشل الإضافة: ' . $response->body());
    }

    public function index()
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/patients', [
            'select' => 'patient_id,phone,address,birth_date,users_id'
        ]);

        $patients = $response->successful() ? $response->json() : [];

        return view('patients.index', compact('patients'));
    }
}
