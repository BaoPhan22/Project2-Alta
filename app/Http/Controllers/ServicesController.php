<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use stdClass;

use function PHPUnit\Framework\returnSelf;

class ServicesController extends Controller
{
    public function ShowServices()
    {
        $services = Services::all();
        return view('services.all_services', compact('services'));
    }
    public function AddServices()
    {
        $services_cate = Services::all();
        return view('services.add_services', compact('services_cate'));
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
            if ($from > $to) return redirect()->back();
            if ($from < 0) return redirect()->back();
            if ($to > 9999) return redirect()->back();
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
        return view('services.detail_services', compact('services_id'));
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
            if ($from > $to) return redirect()->back();
            if ($from < 0) return redirect()->back();
            if ($to > 9999) return redirect()->back();
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
