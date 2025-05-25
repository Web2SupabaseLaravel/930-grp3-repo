<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * عرض صفحة التسجيل.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * تخزين حساب جديد في Supabase.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // تشفير كلمة المرور
        $hashedPassword = Hash::make($request->password);

        // بيانات Supabase
        $authUrl = 'https://hmfximxdcfimmnsgiuwg.supabase.co/rest/v1/users_accounts';
        $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso';

        // إرسال البيانات إلى Supabase
        $response = Http::withHeaders([
            'apikey' => $apiKey,
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
            'Prefer' => 'return=minimal' // ✅ لا تطلب id
        ])->post($authUrl, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => 'Patient',
        ]);

        // التحقق من نجاح العملية
        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'تم إنشاء الحساب بنجاح. يرجى تسجيل الدخول.');
        } else {
            // طباعة استجابة Supabase
            dd($response->status(), $response->body(), $response->json());
        }
        
    }
}
