<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Show()
    {
        $services = DB::select("SELECT COUNT(services_id) as total, SUM(status='Hoạt động') as active FROM services;
        ");

        $equipments = DB::select("SELECT COUNT(equipments_id) as total, SUM(is_active='Đang hoạt động') as active FROM equipments;
");

        $queuings = DB::select("SELECT COUNT(queuing_id) as total, SUM(status='Đang chờ') as waiting, SUM(status='Đã sử dụng') as used,SUM(status='Đã hủy') as canceled FROM queuings;;
");

        return view('dashboard', compact('services', 'equipments', 'queuings'));

        // var_dump($equip);

        // echo $equip[0]->total;
        // echo $equip[0]->active;
    }
}
