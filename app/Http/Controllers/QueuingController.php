<?php

namespace App\Http\Controllers;

use App\Models\Queuing;
use App\Models\Services;
use Illuminate\Http\Request;

class QueuingController extends Controller
{
    public function ShowQueuings() {
        $queuings = Queuing::all();
        return view('queuings.all_queuings', compact('queuings'));
    }
    public function AddQueuings() {
        $services_cate = Services::all();
        return view('queuings.add_queuings',compact('services_cate'));
    }
}
