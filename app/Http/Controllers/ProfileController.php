<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function MyProfile($id) {
        if ($id != Auth::user()->id) return redirect()->back();
        $user = User::select('username', 'users.name as un', 'phone', 'email', 'password', 'id', 'roles.name as rn')->leftJoin('roles', 'roles.role_id', '=', 'users.role_id')->where('users.id','=',$id)->get();
        // print_r($users);
        // echo $users;
        // foreach($user as $item) echo $item;
        return view('profile.edit', compact('user'));
        // echo $user[0]; 
    }

    public function ShowUsers()
    {
        $users = User::select('username', 'users.name as un', 'phone', 'email', 'status', 'id', 'roles.name as rn')->leftJoin('roles', 'roles.role_id', '=', 'users.role_id')->orderBy('id', 'desc')->paginate(5);
        // print_r($users);
        // echo $users;
        // foreach($users as $item) echo $item;
        return view('system.users.all_users', compact('users'));
    }

    public function AddUser()
    {
        $roles = Role::all('role_id', 'name');
        return view('system.users.add_user', compact('roles'));
    }

    public function StoreUser(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required',
        //     'role_id' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        //     'status' => 'required',
        // ]);

        $request = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);
        // User::create($request->post());
        event(new Registered($request));
        return redirect()->route('system.user');
    }

    public function EditUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('system.users.edit_user', compact('user', 'roles'));
    }

    public function UpdateUser(Request $request)
    {
        $user = $request->id;
        User::findOrFail($user)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);
        return redirect()->route('system.user');
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
