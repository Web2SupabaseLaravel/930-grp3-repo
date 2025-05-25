<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * عرض نموذج تسجيل الدخول.
     */
    public function showLoginForm()
    {
        return view('auth.login-supabase');
    }

    /**
     * تنفيذ تسجيل الدخول عبر Supabase.
     */
    public function login(Request $request)
    {
        // التحقق من صحة البيانات المُدخلة
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // بيانات المُدخلات
        $email = $request->input('email');
        $password = $request->input('password');

        // 🟢 روابط ومفتاح Supabase
        $authUrl = 'https://hmfximxdcfimmnsgiuwg.supabase.co/auth/v1/token?grant_type=password';
        $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso';

        // إرسال طلب تسجيل الدخول إلى Supabase
        $response = Http::withHeaders([
            'apikey' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post($authUrl, [
            'email' => $email,
            'password' => $password,
        ]);

        // التحقق من نجاح تسجيل الدخول
        if ($response->successful() && isset($response['access_token'])) {
            // تخزين بيانات المستخدم في الجلسة
            Session::put('user', $response->json());
            return redirect()->route('dashboard'); // أو أي صفحة بعد الدخول
        }

        // فشل تسجيل الدخول
        return redirect()
            ->route('login.supabase.form')
            ->with('error', 'فشل تسجيل الدخول. تأكد من البريد وكلمة المرور أو فعّل حسابك بالبريد.');
    }
}
