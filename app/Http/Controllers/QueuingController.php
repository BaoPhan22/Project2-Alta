<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use App\Models\Queuing;
use App\Models\Services;
use Illuminate\Http\Request;
use Mockery\Undefined;
use Barryvdh\DomPDF\Facade\Pdf;

class QueuingController extends Controller
{
    public function Export()
    {
        $queuings = Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->get();
        // print_r($queuings);
        // foreach ($queuings as $item) echo $item;
        $pdf = Pdf::loadView('queuings.export', ['queuings' => $queuings]);
        return $pdf->download('report.pdf');
    }

    public function ReportQueuings($sdate = null, $edate = null)
    {
        if (isset($sdate) && !isset($edate)) return redirect()->back();

        function convertDateToArray($date)
        {
            $date = substr($date, 6);
            return explode('/', $date);
        }

        if (isset($edate) && isset($sdate)) {
            [$sy, $sm, $sd] = explode('-', $sdate);
            [$ey, $em, $ed] = explode('-', $edate);
            $queuingsOriginal = Queuing::select('queuing_id', 'start_date')->get();
            $a = [];
            foreach ($queuingsOriginal as $item) {
                if ((convertDateToArray($item->start_date)[0] >= $sd && convertDateToArray($item->start_date)[0] <= 31 && convertDateToArray($item->start_date)[1] == $sm) && (convertDateToArray($item->start_date)[0] <= $ed && convertDateToArray($item->start_date)[0] > 0 && convertDateToArray($item->start_date)[1] <= $em))
                    array_push($a, $item->queuing_id);
            }
            $queuings = Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->whereIn('queuing_id', $a)->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->get();
            $paginate = false;
        } else {
            $queuings = Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->orderBy('queuing_id', 'asc')->paginate(11);
            $paginate = true;
        }

        return view('queuings.report', compact(
            'queuings',
            'paginate',
            'sdate',
            'edate'
        ));
    }
    public function ShowQueuings(Request $request, ?string $state = null)
    {
        if ($request->services_name != null || $request->status != null || $request->from_equipments != null || $request->sd != null || $request->ed != null || $request->search != null) {
            function convertDateToArray($date)
            {
                $date = substr($date, 6);
                return explode('/', $date);
            }
            $queuings = Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->when($request->services_name != null, function ($q) use ($request) {
                return $q->where('services.services_id', $request->services_name);
            })->when($request->status != null, function ($q) use ($request) {
                return $q->where('queuings.status', $request->status);
            })->when($request->from_equipments != null, function ($q) use ($request) {
                return $q->where('equipments.equipments_id', $request->from_equipments);
            })->when($request->sd != null, function ($q) use ($request) {
                [$sy, $sm, $sd] = explode('-', $request->sd);
                $queuingsOriginal = Queuing::select('queuing_id', 'start_date')->get();
                $a = [];
                foreach ($queuingsOriginal as $item) {
                    if ((convertDateToArray($item->start_date)[0] >= $sd && convertDateToArray($item->start_date)[0] <= 31 && convertDateToArray($item->start_date)[1] == $sm))
                        array_push($a, $item->queuing_id);
                }
                return $q->whereIn('queuing_id', $a);
            })->when($request->easter_date != null, function ($q) use ($request) {
                [$ey, $em, $ed] = explode('-', $request->ed);
                $queuingsOriginal = Queuing::select('queuing_id', 'start_date')->get();
                $a = [];
                foreach ($queuingsOriginal as $item) {
                    if ((convertDateToArray($item->start_date)[0] <= $ed && convertDateToArray($item->start_date)[0] > 0 && convertDateToArray($item->start_date)[1] <= $em))
                        array_push($a, $item->queuing_id);
                }
                return $q->whereIn('queuing_id', $a);
                return $q->where('end_date', $request->ed);
            })->when($request->search != null, function ($q) use ($request) {
                return $q->where('order',  $request->search)->orWhere('services.name', 'like', '%' . $request->search . "%")->orWhere('description', '%' . $request->search . "%");
            })->orderBy('queuing_id', 'asc')->paginate(11);
        } else {
            function getSql($ope, $state)
            {
                return Queuing::select('services.rule as rule', 'services.services_id_custom', 'order', 'queuing_id', 'start_date', 'end_date', 'queuings.status', 'services.name as sn', 'equipments.name as en')->leftJoin('services', 'services.services_id', '=', 'queuings.services_id')->leftJoin('equipments', 'equipments.equipments_id', '=', 'queuings.equipments_id')->where('queuings.status', $ope, $state)->orderBy('queuing_id', 'asc')->paginate(11);
            }

            if ($state == null) {
                $queuings = getSql('!=', '');
            } else if ($state == 'used') {
                $queuings = getSql('=', 'Đã sử dụng');
            } else if ($state == 'waiting') {
                $queuings = getSql('=', 'Đang chờ');
            } else {
                $queuings = getSql('=', 'Đã hủy');
            }
        }

        $equip_to_filter = Equipments::select('equipments_id', 'name')->get();
        $services_to_filter = Services::select('services_id', 'name')->get();
        return view('queuings.all_queuings', compact(
            'queuings',
            'equip_to_filter',
            'services_to_filter'
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
