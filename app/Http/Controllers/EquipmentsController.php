<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use App\Models\Services;
use App\Models\EquipmentCategories;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    public function ShowEquipments()
    {
        $equipments = Equipments::all();
        return view('equipments.all_equipments', compact('equipments'));
    }
    public function AddEquipments()
    {
        $equipments_cate = EquipmentCategories::all();
        $services = Services::all();
        return view('equipments.add_equipments', compact('equipments_cate', 'services'));
    }
    public function StoreEquipments(Request $request)
    {
        $request->validate([
            'equipments_id_custom' => 'required',
            'name' => 'required',
            'ip_address' => 'required',
            'equipments_categories_id' => 'required',
            'username' => 'required',
            'password' => 'required',
            'services' => 'required',
        ]);
        Equipments::create([
            'equipments_id_custom' => $request->equipments_id_custom,
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'equipments_categories_id' => $request->equipments_categories_id,
            'username' => $request->username,
            'password' => $request->password,
            'services' => serialize($request->services),
            'is_connect' => 'Kết nối',
            'is_active' => 'Đang hoạt động',
        ]);
        return redirect()->route('equipments.all');
    }
}
