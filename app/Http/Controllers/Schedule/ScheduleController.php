<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedules;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class ScheduleController extends Controller
{

    use ApiResponser;
    
    public function index() {
        $schedule = Schedules::ScheduleJson();
        return response()->json($schedule, 200);
    }

    public function store(Request $request) {
        
        $data = $request->all();
        
        return response()->json($data);
    }

    public function update(Request $request, $id) {

    }

    public function show($id) {
        
        $format = request()->format();
        $data = Schedules::findOrFail($id);

        if($data->count() > 0) {
            switch ($format) {
                case 'jspn':
                default:
                $response = $this->sendResponse($data, 'GET Schedule First', 200);
                    break;
            }
        } else {
            switch ($format) {
                case 'jspn':
                default:
                $response = $this->errorResponse($data, 'GET Schedule First Failed', 401);
                    break;
            }
        }

        return $response;
    }

    public function delete($id) {

        $format = request()->format();
        $data = Schedules::findOrFail($id);  

        if($data->delete()) {
            switch ($format) {
                case 'jspn':
                default:
                $response = $this->sendResponse($data, 'GET Schedule First', 200);
                    break;
            }
        } else {
            switch ($format) {
                case 'jspn':
                default:
                $response = $this->errorResponse($data, 'GET Schedule First Failed', 401);
                    break;
            }
        }

        return $response;

    }
}
