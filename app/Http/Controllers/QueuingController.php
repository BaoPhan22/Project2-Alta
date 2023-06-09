<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use App\Models\Queuing;
use App\Models\Services;
use Illuminate\Http\Request;
use Mockery\Undefined;

class QueuingController extends Controller
{
    public function ReportByDate(Request $request) {
        echo $request->sd;
        echo $request->ed;
    }
    public function ReportQueuings($sd = null, $ed = null)
    {
        function convertDateToArray($date)
        {
            $date = substr($date, 6);
            return explode('/', $date);
        }

        // [$sd, $sm, $sy] = convertDateToArray('17:38 06/06/2023');
        // [$ed, $em, $ey] = convertDateToArray('17:38 06/06/2023');



        // if sd not null
        if (isset($sd, $sm, $sy) || isset($ed, $em, $ey)) {
            $sorted_by_date = [];
            $queuings = Queuing::select('queuing_id', 'start_date')->get();
            // if ed is not null
            if (isset($ed)) {
                foreach ($queuings as $item) {
                    if (convertDateToArray($item->start_date)[0] >= $sd && convertDateToArray($item->start_date)[0] <= $ed)
                        array_push($sorted_by_date, Queuing::findOrFail($item->queuing_id));
                }
                // if ed is null
            } else {
                foreach ($queuings as $item) {
                    if (convertDateToArray($item->start_date)[0] >= $sd)
                        array_push($sorted_by_date, Queuing::findOrFail($item->queuing_id));
                }
            }
            $queuings = $sorted_by_date;
            $paginate = false;
            // if sd is null
        } else {
            $queuings = Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->orderBy('queuing_id', 'asc')->paginate(11);
            $paginate = true;
        }

        $services_cate = Services::all('services_id', 'name', 'rule', 'services_id_custom');
        $equip_cate = Equipments::all('equipments_id', 'name');
        return view('queuings.report', compact('queuings', 'services_cate', 'equip_cate', 'paginate'));
    }
    public function ShowQueuings()
    {
        $queuings = Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->orderBy('queuing_id', 'asc')->paginate(11);
        return view('queuings.all_queuings', compact(
            'queuings'
        ));
    }
    public function ShowQueuingsDetail($id)
    {
        $queuings_detail = Queuing::select('services.rule as rule', 'services.name as sn', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->where('queuings.queuing_id', '=', $id)->get();
        return view('queuings.detail_queuings', compact('queuings_detail'));
        // echo $id;
        // echo $queuings_detail;
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

        $order = 0;
        if ($resetByDay == 1)
            $totalRowByServiec = Queuing::where('services_id', '=', $request->idservice_hidden)->where('start_date', 'like', '%' . $today . '%')->count();
        else
            $totalRowByServiec = Queuing::where('services_id', '=', $request->idservice_hidden)->count();


        $maxRowInDb = Services::find($request->idservice_hidden)->to;
        if ($totalRowByServiec >= $maxRowInDb)
            $totalRowByServiec = $totalRowByServiec % $maxRowInDb;

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
        return view('queuings.add_queuings', compact('services_cate', 'selectedItem_hidden'))->with(['queuings' => $queuings_last_id]);
        // return redirect()->route('queuings.add',['queuings' => $queuings_last_id,'services_cate'=>$services_cate,'selectedItem_hidden'=>$selectedItem_hidden]);
    }
}
