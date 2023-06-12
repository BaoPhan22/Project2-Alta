<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function ShowRole()
    {
        DB::statement("SET SQL_MODE=''");
        $roles = DB::select("SELECT `roles`.`role_id`, `description`, `roles`.`name`, count('users.id') as amount FROM `roles` LEFT JOIN `users` ON `users`.`role_id` = `roles`.`role_id` WHERE `users`.`role_id` = `roles`.`role_id` GROUP BY `roles`.`role_id`");

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
        $role_last_insert_id = Role::insertGetId([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        Diary::create([
            'username' => $request->usernameAuth,
            'ip_address' => '116.193.72.58',
            'action' => 'Thêm vai trò ID: ' . $role_last_insert_id
        ]);
        return redirect()->route('system.role');
    }

    public function EditRole($id)
    {
        $role_id = Role::find($id);
        return view('system.role.edit_role', compact('role_id'));
    }

    public function UpdateRole(Request $request)
    {
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Diary::create([
            'username' => $request->usernameAuth,
            'ip_address' => '116.193.72.58',
            'action' => 'Cập nhật vai trò ID: ' . $role_id
        ]);
        return redirect()->route('system.role');
    }
}
