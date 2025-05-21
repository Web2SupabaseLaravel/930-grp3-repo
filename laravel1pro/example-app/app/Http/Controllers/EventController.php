<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function create()
{
    $data['event'] = new \App\Models\users_accounts();
    $data['route'] = 'dataevent.store';
    $data['method'] = 'post';
    $data['titleForm'] = 'Form Input User';
    $data['submitButton'] = 'Submit';
    return view('event/form_event', $data);
}



    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'email' => 'required|email|unique:users_accounts',
        'password' => 'required|min:6',
        'role' => 'required',
        'name' => 'required'
    ]);

    $inputEvent = new \App\Models\users_accounts();

    $inputEvent->user_id = $request->user_id;
    $inputEvent->name = $request->name;
    $inputEvent->email = $request->email;
    $inputEvent->password = bcrypt($request->password);
    $inputEvent->role = $request->role;
    $inputEvent->save();

    return redirect('dataevent/create')->with('success', 'User created successfully');
}



    public function index()
{
    $data['events'] = \App\Models\users_accounts::all();
    return view('event/index_event', $data);
}



    public function edit($id)
{
    $data['event'] = \App\Models\users_accounts::findOrFail($id);
    $data['route'] = ['dataevent.update', $id];
    $data['method'] = 'put';
    $data['titleForm'] = 'Edit User Form';
    $data['submitButton'] = 'Update';
    return view('event/form_event', $data);
}



    public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users_accounts,email,' . $id . ',user_id',
        'password' => 'nullable|min:6',
        'role' => 'required'
    ]);

    $inputEvent = \App\Models\users_accounts::findOrFail($id);
    $inputEvent->user_id = $request->user_id;
    $inputEvent->name = $request->name;
    $inputEvent->email = $request->email;
    if ($request->filled('password')) {
        $inputEvent->password = bcrypt($request->password);
    }
    $inputEvent->role = $request->role;
    $inputEvent->save();

    return redirect('dataevent')->with('success', 'User updated successfully');
}



    public function destroy($id)
{
    $inputEvent = \App\Models\users_accounts::findOrFail($id);
    $inputEvent->delete();
    return redirect('dataevent')->with('success', 'User deleted');
}
}
