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
        $sql = "SELECT ";
        for ($i = 1; $i <= 31; $i++) {
            if ($i < 10)
                $sql .= "sum(start_date LIKE '%0" . $i . "/06/2023%') as '0" . $i . "/06',";
            elseif ($i >= 10 && $i < 31)
                $sql .= "sum(start_date LIKE '%" . $i . "/06/2023%') as '" . $i . "/06',";
            else $sql .= "sum(start_date LIKE '%0" . $i . "/06/2023%') as '" . $i . "/06'";
        }
        $sql .= " FROM `queuings` ";

        $data = DB::select($sql);
        $dataToChart = json_decode(json_encode($data), true);

        function popZero($a)
        {
            return $a != 0;
        }
        $dataToChart = array_filter($dataToChart[0]);

        $dataToChart = json_encode($dataToChart);

        return view('dashboard', compact('services', 'equipments', 'queuings','dataToChart'));
    }
}
