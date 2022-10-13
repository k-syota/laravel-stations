<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ReservationController extends Controller
{
    public function create($id,$schedule_id,Request $request)
    {
        $movie = Movie::findOrFail($id);
        $schedule = Schedule::findOrFail($schedule_id);
        $sheet = Sheet::findOrfail($request->sheet_id);
        $screening_date = $request->screening_date;
        // dd($screening_date);
        return view('reservation.create',compact("movie","schedule","sheet","screening_date"));
    }

    public function store(Request $request)
    {

        // dd("test");
        $validate = $request->validate(
            [
                "name" => 'required|string',
                "email" => 'required|email',    
            ]
            );

        $newReservation = Reservation::create([
            "screening_date" => $request->screening_date,
            "schedule_id" => $request->schedule_id,
            "sheet_id" => $request->sheet_id,
            "email" => $validate['email'],
            "name" => $validate['name'],
        ]);

        $movie = Movie::findOrFail($request->id);

        return redirect()->route("movie.show",[$movie->id]);
    }
}
