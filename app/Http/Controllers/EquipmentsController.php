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
    public function ShowEquipmentsDetail($id)
    {
        $equip = Equipments::findOrFail($id,['equipments_id', 'name', 'equipments_id_custom', 'equipments_categories_id', 'ip_address', 'username', 'password']);
        $servicesOfEquipments = ServicesOfEquipments::all();
        $services_id = Services::all('services_id', 'name');
        $equip_cate = EquipmentCategories::all();
        // $queuings_detail = Queuing::findOrFail($id);
        // $services_cate = Services::all('services_id', 'name', 'rule', 'services_id_custom');
        return view(
            'equipments.detail_equipments',
            compact(
                'equip','equip_cate','servicesOfEquipments','services_id'
            )
        );
    }
    public function ShowEquipments()
    {
        $services_id = Services::all('services_id', 'name');
        // foreach($services_id as $item) {
        //     if ($item->services_id == 1)
        //     echo $item->name;
        // }
        $equipments = Equipments::orderBy('equipments_id','desc')->paginate(5);
        $servicesOfEquipments = ServicesOfEquipments::all();
        return view('equipments.all_equipments', compact('equipments', 'servicesOfEquipments', 'services_id'));
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
        // get data form servicesofequipments table (third table of services and equipments)
        $a = array();
        foreach ($ServicesOfEquipments as $item) {
            if ($item->equipments_id === $equipments->equipments_id) {
                $jArr = json_decode($item, true);
                $a[] = $jArr['services_id'];
            }
        }
        return view('equipments.edit_equipments', compact('equipments', 'equipments_cate', 'services', 'a'));
    }
    public function UpdateEquipments(Request $request)
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
        Equipments::findOrFail($request->id)->update([
            'equipments_id_custom' => $request->equipments_id_custom,
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'equipments_categories_id' => $request->equipments_categories_id,
            'username' => $request->username,
            'password' => $request->password,
            'is_connect' => 'Kết nối',
            'is_active' => 'Đang hoạt động',
        ]);
        ServicesOfEquipments::where('equipments_id', $request->id)->delete();
        foreach ($request->services as $item) {
            ServicesOfEquipments::create([
                'equipments_id' => $request->id,
                'services_id' => $item,
            ]);
        }
        return redirect()->route('equipments.all');
    }
}
