<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SheetController extends Controller
{
    // public function index()
    // {
    //     $sheets = Sheet::all();
    //     return view("sheet.index",compact("sheets"));
    // }

    public function index($id, $schedule_id)
    {
        $movie = Movie::findOrFail($id);
        $schedule = Schedule::findOrFail($schedule_id);
        $sheets = Sheet::leftJoin('reservations', 'sheets.id', '=', 'reservations.sheet_id')
        ->select("sheets.*","reservations.id as reservation_id")->get();;
        Log::debug(print_r($sheets->toArray(), true));
        return view("sheet.index",compact("sheets","movie","schedule"));
    }
}
