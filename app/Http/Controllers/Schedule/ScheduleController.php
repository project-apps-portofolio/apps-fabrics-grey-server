<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedules;

class ScheduleController extends Controller
{
    
    public function index() {
        $schedule = Schedules::ScheduleJson();

        return response()->json($schedule, 200);
    }
}
