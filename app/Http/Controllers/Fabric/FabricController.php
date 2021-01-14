<?php

namespace App\Http\Controllers\Fabric;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Repositories\FabricRepository;

class FabricController extends Controller
{

    use ApiResponser;
    
    public function __construct()
    {
        $this->fabric = Fabric::FabricJson();
    }

    public function index() {
        try {
            
            $result = $this->fabric;
            if($result->count() > 0) {
                return $this->successResponse($result, 'GET Success', 200);
            } else {
                return $this->successResponse($result, 'GET Success', 200);
            
            }            
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse(['data' => 'failed'], 401);
        }
    }

    public function store(Request $request) {

        $data = new Fabric($request->all());
        $format = $request->format();

        if($data->save()) {
            switch ($format) {
                case 'json':                
                default:
                    $response = $this->successResponse($data, 'POST Data', 200);
                    break;
            }
        } else {
            switch ($format) {
                case 'json':                
                default:
                    $response = $this->errorResponse($data, 'POST Data', 200);
                    break;
            }
        }

        return $response;
    }

    public function update(Request $request, $id) {
        
        $update = [
            'fabric_type' => $request->input('fabric_type'),
            'machine_id' => $request->input('machine_id'),
            'brand' => $request->input('brand'),
            'po_number' => $request->input('po_number')
        ];

        $data = Fabric::find($id);

        $data->fabric_type = $update['fabric_type'];
        $data->machine_id = $update['machine_id'];
        $data->brand = $update['brand'];
        $data->po_number = $update['po_number'];

        if($data->save()) {
            return $this->successResponse($data, 'PUT Success',200);
        }
    } 
}
