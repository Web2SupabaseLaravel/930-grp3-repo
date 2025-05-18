<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users_accounts;
class Users_accountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data['users'] = \App\Models\Users_accounts::all()->where('role', 'Doctor');
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $data['users_accounts'] = new \App\Models\Doctors();
              $data['route'] = 'datausers_accounts.store';
              $data['method'] = 'post';
               # $data['titleForm'] = 'Form Input Event';
              #$data['submitButton'] = 'Submit';
              #return view('event/form_event', $data);s
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
          'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required',
        ]);

        $inputUsers = new \App\Models\Users_accounts();

$inputUsers->name = $request->name;
$inputUsers->email = $request->email;
$inputUsers->password = Hash::make($request->password);
$inputUsers->role = $request->role;
$inputUsers->save();
return redirect ('datausers_accounts');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $users= Users_accounts::findOrfail($id);
        $users=update([$request->all()]);
        return response()->json($users,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          $user = Users_accounts::findOrFail($id);
        $user->delete();
        return response()->json(null,204);
    }
}
