<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\users_accounts;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserAccountController extends Controller
{
    public function create()
    {
        return response()->json([
            'event' => new \App\Models\users_accounts(),
            'route' => 'dataevent.store',
            'method' => 'post',
            'titleForm' => 'Form Input User',
            'submitButton' => 'Submit',
        ]);
    }

    public function show($id)
{
    return response()->json(\App\Models\users_accounts::findOrFail($id));
}


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users_accounts',
            'password' => 'required|min:6',
            'role' => 'required',
            'name' => 'required'
        ]);

        $inputEvent = new \App\Models\users_accounts();

        $inputEvent->name = $request->name;
        $inputEvent->email = $request->email;
        $inputEvent->password = bcrypt($request->password);
        $inputEvent->role = $request->role;
        $inputEvent->save();

        return response()->json(['message' => 'User created successfully']);
    }

    public function index()
    {
        $events = \App\Models\users_accounts::all();
        return response()->json($events);
    }

    public function edit($id)
    {
        $event = \App\Models\users_accounts::findOrFail($id);
        return response()->json([
            'event' => $event,
            'route' => ['dataevent.update', $id],
            'method' => 'put',
            'titleForm' => 'Edit User Form',
            'submitButton' => 'Update',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users_accounts,email,' . $id . ',user_id',
            'password' => 'nullable|min:6',
            'role' => 'required'
        ]);

        $inputEvent = \App\Models\users_accounts::findOrFail($id);
        $inputEvent->name = $request->name;
        $inputEvent->email = $request->email;
        if ($request->filled('password')) {
            $inputEvent->password = bcrypt($request->password);
        }
        $inputEvent->role = $request->role;
        $inputEvent->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    public function destroy($id)
    {
        $inputEvent = \App\Models\users_accounts::findOrFail($id);
        $inputEvent->delete();
        return response()->json(['message' => 'User deleted']);
    }
}