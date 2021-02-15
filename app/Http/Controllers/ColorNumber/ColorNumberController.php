<?php

namespace App\Http\Controllers\ColorNumber;

use App\Http\Controllers\Controller;
use App\Models\ColorNumber;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

class ColorNumberController extends Controller
{


    use ApiResponser;


    public function __construct()
    {
    }

    public function index()
    {

        $format = request()->format();
        $data = ColorNumber::ColorNumberJson();

        try {
            if ($data->count() > 0) {
                switch ($format) {
                    default:
                        $response = $this->sendResponse($data, 'GET Color Number', 200);
                        break;
                }
            } else {
                switch ($format) {
                    default:
                        $response = $this->sendResponse($data, 'GET Color Number', 200);
                        break;
                }
            }
        } catch (\Throwable $th) {


            return response()->json($th->getMessage());
        } catch (\Illuminate\Database\QueryException $ex) {

            return response()->json($ex->getMessage());
        }

        return $response;
    }

    public function store()
    {

        $data = new ColorNumber;

        DB::beginTransaction();

        try {
            $data->ColorNumberSave();
            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            // abort(500);
            return $this->sendResponse('erros', 'DATA POST Color Number', 401);
        }

        return $this->sendResponse($data, 'DATA POST Color Number', 200);
    }

    public function edit($id)
    {

        $format = request()->format();
        $data = ColorNumber::FindById($id);

        if ($data->count() > 0) {
            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'GET Color Number By Id');
                    break;
            }
        } else {
            switch ($format) {
                case 'json':
                default:
                    $response = $this->sendResponse($data, 'GET Color Nimber');
                    break;
            }
        }

        return $response;
    }

    public function update($id)
    {
        $request = request();
        $format = request()->format();
        $data = ColorNumber::findOrFail($id);

        $data->previous_color_number_id = $request->previous_color_number_id;
        $data->customer_id = $request->customer_id;
        $data->color_ref_id = $request->color_ref_id;
        $data->color_code = $request->color_code;
        $data->color_common_name = $request->color_common_name;
        $data->is_polyester = $request->is_polyester;
        $data->fabric_type = $request->fabric_type;
        $data->total_price = $request->total_price;
        $data->is_standard = $request->is_standard;


        if ($data->save()) {
            $response = $this->sendResponse($data, 'PUT Color Number Success', 200);
        } else {
            $response = $this->errorResponse('ERRORS', 'PUT Color Number Success', 401);
        }

        return $response;
    }

    public function destroy($id)
    {

        try {
            $data = ColorNumber::findOrFail($id);

            if ($data->delete()) {
                $response = $this->sendResponse($data, 'PUT Color Number Success', 200);
            } else {
                $response = $this->errorResponse('ERRORS', 'PUT Color Number Success', 401);
            }

            return $response;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        } catch (\Illuminate\Database\QueryException $ex) {

            return response()->json($ex->getMessage());
        }
    }
}
