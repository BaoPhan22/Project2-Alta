<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function ShowDiary(Request $request)
    {
        if ($request->sd != null || $request->ed != null || $request->search !=null) {
            $diary = Diary::when($request->sd != null, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->sd);
            })->when($request->ed != null, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->ed);
            })->when($request->search != null, function ($q) use ($request) {
                return $q->where('username', 'like', '%'.$request->search."%")->orWhere('ip_address','like','%'.$request->search."%")->orWhere('action','like','%'.$request->search."%");
            })->get();
        } else {
            $diary = Diary::select('username', 'ip_address', 'action', 'created_at')->get();
        }
        return view('system.diary.all', compact('diary'));
    }
}
