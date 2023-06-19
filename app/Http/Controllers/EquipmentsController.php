<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use Illuminate\Support\Facades\DB;
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
        $equipments = DB::select("SELECT `equipments_id_custom`, `equipments`.`name`, `username`, `password`,`ip_address`, `equipments_id`,`equipment_categories`.`name` as `ecname` \n"

            . "FROM equipments,equipment_categories WHERE equipments.equipments_id = 20 and equipment_categories.equipments_categories_id = equipments.equipments_categories_id");

        // echo $equipments;

        $sql2 = "SELECT `equipments`.`equipments_id`,`services`.`name`\n"

            . "FROM `equipments`,`services`,`services_of_equipments` WHERE 1 AND services_of_equipments.equipments_id = equipments.equipments_id AND services_of_equipments.services_id = services.services_id;";
        $services_of_equipments = DB::select($sql2);


        return view('equipments.detail_equipments', compact('equipments', 'services_of_equipments'));
    }
    public function ShowEquipments(Request $request)
    {
        if ($request->isActive != null || $request->isConnect != null || $request->search != null) {
            $equipments = Equipments::select('equipments_id_custom', 'name', 'ip_address', 'is_connect', 'is_active', 'equipments_id')->when($request->isActive != null, function ($q) use ($request) {
                return $q->where('is_active', $request->isActive);
            })->when($request->isConnect != null, function ($q) use ($request) {
                return $q->where('is_connect',  $request->isConnect);
            })->when($request->search != null, function ($q) use ($request) {
                return $q->where('ip_address',  $request->search)->orWhere('equipments_id_custom',$request->search)->orWhere('name',$request->search);
            })->orderBy('equipments_id', 'desc')->paginate(5);
        } else {
            $equipments = Equipments::select('equipments_id_custom', 'name', 'ip_address', 'is_connect', 'is_active', 'equipments_id')->orderBy('equipments_id', 'desc')->paginate(5);
        }
        $sql2 = "SELECT `equipments`.`equipments_id`,`services`.`name`\n"
            . "FROM `equipments`,`services`,`services_of_equipments` WHERE 1 AND services_of_equipments.equipments_id = equipments.equipments_id AND services_of_equipments.services_id = services.services_id;";
        $services_of_equipments = DB::select($sql2);
        return view('equipments.all_equipments', compact('equipments', 'services_of_equipments'));
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
