<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Supabase</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <form method="POST" action="{{ route('login.supabase') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 mb-4 border rounded">
            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 mb-4 border rounded">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
        </form>

        @if(session('error'))
            <div class="mt-4 text-red-600">{{ session('error') }}</div>
        @endif
    </div>
</body>
</html>
