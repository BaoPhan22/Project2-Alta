<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function ShowRole() {
        $roles = Role::all();
        return view('system.role.all_role', compact('roles'));
    }

    public function AddRole() {
        return view('system.role.add_role');
    }
}
