<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use App\Models\Services;
use App\Models\ServicesOfEquipments;
use App\Models\EquipmentCategories;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

class EquipmentsController extends Controller
{
    public function ShowEquipments()
    {
        $equipments = Equipments::all();
        $servicesOfEquipments = ServicesOfEquipments::all();
        return view('equipments.all_equipments', compact('equipments', 'servicesOfEquipments'));
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
        $equipments_get_last_id = Equipments::insertGetId([
            'equipments_id_custom' => $request->equipments_id_custom,
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'equipments_categories_id' => $request->equipments_categories_id,
            'username' => $request->username,
            'password' => $request->password,
            'is_connect' => 'Kết nối',
            'is_active' => 'Đang hoạt động',
        ]);

        foreach ($request->services as $item) {
            ServicesOfEquipments::create([
                'equipments_id' => $equipments_get_last_id,
                'services_id' => $item,
            ]);
        }
        return redirect()->route('equipments.all');
    }
    public function EditEquipments($id)
    {
        $equipments_cate = EquipmentCategories::all('equipments_categories_id', 'name');
        $services = Services::all('services_id', 'name');
        $equipments = Equipments::find($id);
        $ServicesOfEquipments = ServicesOfEquipments::all('equipments_id', 'services_id');


        $a = array();

        foreach ($ServicesOfEquipments as $item) {
            if ($item->equipments_id === $equipments->equipments_id) {
                // $a->array_push($item);
                // echo $item;
                $jArr = json_decode($item, true);
                // echo $jArr['equipments_id'] . PHP_EOL;  // John
                $a[] = $jArr['services_id'];
            }
        }

        return view('equipments.edit_equipments', compact('equipments', 'equipments_cate', 'services', 'a'));
    }
}
