<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

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
        $request->validate([
            'services_id_custom' => 'required',
            'name' => 'required',
        ]);
        Services::create($request->post());
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
    public function UpdateServices(Request $request){
        $services_id = $request->services_id;
        Services::findOrFail($services_id)->update([
            'name' => $request->name,
            'services_id_custom' => $request->services_id_custom,
            'description' => $request->description,
        ]);
        return redirect()->route('services.all');
    }
}
