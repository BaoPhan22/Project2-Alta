<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function ShowServices() {
        $services = Services::all();
        return view('services.all_services', compact('services'));
    }
    public function AddServices() {
        $services_cate = Services::all();
        return view('services.add_services',compact('services_cate'));
    }
}
