<?php

namespace App\Http\Controllers;

use App\Models\Queuing;
use App\Models\Services;
use Illuminate\Http\Request;
use Mockery\Undefined;

class QueuingController extends Controller
{
    public function ShowQueuings()
    {
        $services_cate = Services::all('services_id','name','rule','services_id_custom');
        // foreach($services_cate as $item) {
        //     if ($item->services_id == 3) echo $item->name;
        // }
        $queuings = Queuing::orderBy('queuing_id', 'asc')->paginate(8);
        return view('queuings.all_queuings', compact('queuings','services_cate'));
    }
    public function AddQueuings()
    {
        $services_cate = Services::all();
        return view('queuings.add_queuings', compact('services_cate'));
    }
    public function StoreQueuings(Request $request)
    {
        $resetByDay = $request->rsbd_hidden;

        $today = date('d/m/Y');

        if ($resetByDay == 1) {
            $totalRowByServiec = Queuing::where('services_id', '=', $request->idservice_hidden)->where('start_date', 'like', '%' . $today . '%')->count();
        } else {
            $totalRowByServiec = Queuing::where('services_id', '=', $request->idservice_hidden)->count();
        }

        $order = (int)$totalRowByServiec + 1;


        $queuings_last_id = Queuing::insertGetId([
            'users_id' => $request->iduser_hidden,
            'services_id' => $request->idservice_hidden,
            'equipments_id' => 17,
            'start_date' => $request->start_hidden,
            'end_date' => $request->end_hidden,
            'order' => $order,
        ]);

        $selectedItem_hidden = $request->selectedItem_hidden;
        $services_cate = Services::all();
        return view('queuings.add_queuings',compact('services_cate','selectedItem_hidden'))->with(['queuings' => $queuings_last_id]);
    }
}
