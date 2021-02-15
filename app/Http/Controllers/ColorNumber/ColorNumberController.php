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

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
