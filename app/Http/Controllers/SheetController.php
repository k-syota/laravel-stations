<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function index()
    {
        $sheets = Sheet::all();
        return view("sheet.index",compact("sheets"));
    }

    public function show($id, $schedule_id)
    {
        $movie = Movie::findOrFail($id);
        $schedule = Schedule::findOrFail($schedule_id);
        $sheets = Sheet::all();
        return view("sheet.show",compact("sheets","movie","schedule"));
    }
}
