<?php

namespace App\Http\Controllers\Admin;

use Auth;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
        $this->middleware('can:manageUsers,App\User');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('model', User::paginate(20));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index')->with('status', 'You cannot edit yourself.');
        }

        return view('admin.users.edit', [
            'model' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index')->with('status', 'You cannot edit yourself.');
        }

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('status', "$user->name was updated.");        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
