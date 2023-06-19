<?php

namespace App\Http\Controllers;

use App\Models\Queuing;
use Illuminate\Http\Request;
use App\Models\Services;
use stdClass;

use function PHPUnit\Framework\returnSelf;

class ServicesController extends Controller
{
    public function ShowServices(Request $request)
    {
        if ($request->isActive != null || $request->search != null) {
            $services = Services::select('services_id','name','description','status','services_id_custom')->when($request->isActive != null, function ($q) use ($request) {
                return $q->where('status', $request->isActive);
            })->when($request->search != null, function ($q) use ($request) {
                return $q->where('services_id_custom',  $request->search)->orWhere('name','like','%'.$request->search."%")->orWhere('description','like','%'.$request->search."%");
            })->get();
        } else {
            $services = Services::select('services_id','name','description','status','services_id_custom')->get();
        }
        return view('services.all_services', compact('services'));
    }
    public function AddServices()
    {
        return view('services.add_services');
    }
    public function StoreServices(Request $request)
    {
        $from = null;
        $to = null;
        $reset_by_day = null;
        $rule = null;

        if ($request->autoIncreasing) {
            $from = $request->from;
            $to = $request->to;
            if ($from > $to || $from < 0 || $to > 9999) return redirect()->back();
            $reset_by_day = $request->resetByDay;

            // 0: prefix
            // 1: surfix
            $rule = $request->rule;
        }

        $request->validate([
            'services_id_custom' => 'required',
            'name' => 'required',
        ]);
        Services::create([
            'services_id_custom' => $request->services_id_custom,
            'name' => $request->name,
            'from' => $from,
            'to' => $to,
            'rule' => $rule,
            'reset_by_day' => $reset_by_day
        ]);
        return redirect()->route('services.all');
    }
    public function EditServices($id)
    {
        $services_id = Services::find($id);
        return view('services.edit_services', compact('services_id'));
    }
    public function DetailServices($id)
    {
        $services_id = Services::find($id);
        $queuing = Queuing::select('order','status')->where('services_id', '=', $id)->paginate(10);
        return view('services.detail_services', compact('services_id','queuing'));
        // echo $services_id;
        // foreach($queuing as $item) {
        //     echo $item;
        // } 
    }
    public function UpdateServices(Request $request)
    {
        $from = null;
        $to = null;
        $reset_by_day = null;
        $rule = null;

        if ($request->autoIncreasing) {
            $from = $request->from;
            $to = $request->to;
            if ($from > $to || $from < 0 || $to > 9999) return redirect()->back();

            $reset_by_day = $request->resetByDay;

            // 0: prefix
            // 1: surfix
            $rule = $request->rule;
        }
        $services_id = $request->services_id;
        Services::findOrFail($services_id)->update([
            'services_id_custom' => $request->services_id_custom,
            'name' => $request->name,
            'from' => $from,
            'to' => $to,
            'rule' => $rule,
            'reset_by_day' => $reset_by_day
        ]);
        return redirect()->route('services.all');
    }
}
