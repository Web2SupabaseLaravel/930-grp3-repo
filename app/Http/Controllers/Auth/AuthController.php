<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // المفتاح العام من Supabase (anon key)
    private $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso';

    public function showLoginForm()
    {
        return view('auth.login-supabase');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $authUrl = 'https://hmfximxdcfimmnsgiuwg.supabase.co/auth/v1/token?grant_type=password';

        $response = Http::withHeaders([
            'apikey' => $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($authUrl, [
            'email' => $email,
            'password' => $password,
        ]);

        if ($response->successful() && isset($response['access_token'])) {
            // ممكن تخزن بيانات المستخدم بالسيشن لو بدك
            Session::put('user', $response->json());

            return response()->json([
                'message' => 'تم تسجيل الدخول بنجاح.',
                'token' => $response['access_token'],
                'user' => $response->json()
            ], 200);
        }

        return response()->json([
            'error' => 'فشل تسجيل الدخول. تأكد من صحة البيانات.'
        ], 401);
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $email = $request->input('email');
    $password = $request->input('password');
    $name = $request->input('name');

    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso';

    $registerUrl = 'https://hmfximxdcfimmnsgiuwg.supabase.co/auth/v1/signup';

    $response = Http::withHeaders([
        'apikey' => $apiKey,
        'Content-Type' => 'application/json',
    ])->post($registerUrl, [
        'email' => $email,
        'password' => $password,
    ]);

    if ($response->successful()) {
        // ⬇️ بعد نجاح التسجيل، أضف الاسم إلى جدول users_accounts (أو profiles) في Supabase
        $userId = $response->json()['user']['id'] ?? null;

        if ($userId) {
            Http::withHeaders([
                'apikey' => $apiKey,
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://hmfximxdcfimmnsgiuwg.supabase.co/rest/v1/users_accounts', [
                'id' => $userId,
                'full_name' => $name,
                'email' => $email
            ]);
        }

        return response()->json(['message' => 'تم التسجيل بنجاح.'], 201);
    }

    return response()->json([
        'error' => $response->json()['msg'] ?? 'فشل التسجيل',
        'details' => $response->json()
    ], 422);
}

    public function user(Request $request)
    {
        return response()->json(Session::get('user'));
    }

    public function logout(Request $request)
    {
        Session::forget('user');
        return response()->json(['message' => 'تم تسجيل الخروج.']);
    }
}
