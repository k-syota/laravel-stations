<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();

        return view ("schedules.index",compact("schedules"));
    }

    public function show($id)
    {
        $schedule = Schedule::findOrfail($id);
        return view ("schedules.show",compact("schedule"));
    }

    public function create()
    {
        # code...
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrfail($id);
        return view ("schedules.edit",compact("schedule"));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
        ]);
        return to_route("schedule.index");
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id)->delete();

        return to_route("schedule.index");
    }
}
