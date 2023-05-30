<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use App\Models\EquipmentCategories;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    public function ShowEquipments() {
        $equipments = Equipments::all();
        return view('equipments.all_equipments', compact('equipments'));
    }
    public function AddEquipments() {
        $equipments_cate = EquipmentCategories::all();
        return view('equipments.add_equipments',compact('equipments_cate'));
    }
}
