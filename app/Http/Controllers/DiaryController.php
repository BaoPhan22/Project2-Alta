<?php

namespace App\Http\Controllers;

use App\Models\Diary;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function ShowDiary()
    {
        $diary = Diary::select('username', 'ip_address', 'action', 'created_at')->get();
        // foreach($diary as $item) echo $item;
        return view('system.diary.all', compact('diary'));
    }
}
