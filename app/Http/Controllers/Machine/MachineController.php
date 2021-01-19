<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use App\Traits\ApiResponser;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{

    use ApiResponser;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

        $data = Machine::MachineJson();
        $format = request()->format();

        if ($data->count() > 0) {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->successResponse($data, 'GET Machine', 200);
                    break;
            }
        } else {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->errorResponse($data, 'GET Machine', 401);
                    break;
            }
        }
        return $response;
    }

    public function store(Request $request)
    {
        $credentials = $request->all();

        $data = new Machine($credentials);
        $format = $request->format();

        if ($data->save()) {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'POST Machine', 200);
                    break;
            }
        } else {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->errorResponse($data, 'POST Machine', 401);
                    break;
            }
        }

        return $response;
    }

    public function update(Request $request, $id)
    {

        $data_ = [
            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),
            'type_machine' => $request->input('type_machine')
        ];

        $format = $request->format();
        $data = Machine::findOrFail($id);

        $data->name = $data_['name'];
        $data->short_name = $data_['short_name'];
        $data->type_machine = $data_['type_machine'];


        if ($data->save()) {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'POST Machine', 200);
                    break;
            }
        } else {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->errorResponse($data, 'POST Machine', 401);
                    break;
            }
        }

        return $response;
    }

    public function delete($id)
    {
        $format = request()->format();

        $data = Machine::findOrFail($id);

        if ($data->delete()) {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'DELETE Machine', 200);
                    break;
            }
        } else {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'DELETE Machine', 401);
                    break;
            }
        }

        return $response;
    }

    public function show($id) {

        $format = request()->format();

        $data = Machine::findOrFail($id);

        if ($data->count() > 0) {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'DELETE Machine', 200);
                    break;
            }
        } else {

            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'DELETE Machine', 401);
                    break;
            }
        }

        return $response;
    }
}
