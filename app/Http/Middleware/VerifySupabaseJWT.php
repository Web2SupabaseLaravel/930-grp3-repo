<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class VerifySupabaseJWT
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['error' => 'توكن مفقود'], 401);
        }

        try {
            $decoded = JWT::decode($token, new Key(env('SUPABASE_JWT_SECRET'), 'HS256'));
            // أضف الـ user للـ request إذا بدك:
            $request->merge(['user' => (array) $decoded]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'توكن غير صالح: ' . $e->getMessage()], 401);
        }

        return $next($request);
    }
}
