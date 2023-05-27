<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function ShowRole()
    {
        $roles = Role::all();
        return view('system.role.all_role', compact('roles'));
    }

    public function AddRole()
    {
        return view('system.role.add_role');
    }

    public function StoreRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Role::create($request->post());
        return redirect()->route('system.role');
    }

    public function EditRole($id)
    {
        $role_id = Role::find($id);
        return view('system.role.edit_role', compact('role_id'));
    }

    public function UpdateRole(Request $request){
        $role_id = $request->id;
        Role::findOrFail($role_id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('system.role');
    }
}
