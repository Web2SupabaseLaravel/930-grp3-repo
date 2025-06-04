<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
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
        $apiKey = 'eyJhbGciOiJI...'; // ⚠️ تأكد من إبقائه سرياً

        $response = Http::withHeaders([
            'apikey' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post($authUrl, [
            'email' => $email,
            'password' => $password,
        ]);

        if ($response->successful() && isset($response['access_token'])) {
            Session::put('user', $response->json());
            return redirect()->route('dashboard');
        }

        return redirect()
            ->route('login.supabase.form')
            ->with('error', 'فشل تسجيل الدخول.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $apiKey = 'eyJhbGciOiJI...';
        $registerUrl = 'https://hmfximxdcfimmnsgiuwg.supabase.co/auth/v1/signup';

        $response = Http::withHeaders([
            'apikey' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post($registerUrl, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            return response()->json(['message' => 'تم التسجيل بنجاح.'], 201);
        }

        return response()->json(['error' => 'فشل التسجيل'], 422);
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
