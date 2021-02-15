<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class CustomerController extends Controller
{

    use ApiResponser;

    public function __construct()
    {
        //
    }

    public function index() {
        $data = Customer::all();
        return $this->sendResponse($data, 'GET Customes', 200);
    }

    public function store(Request $request) {

        $auto_code = Customer::AutoIncrement();

        $data = new Customer();

        $data->code =  'CPNY '.$auto_code[0]->Auto_increment;
        $data->name = $request->input('name');
        $data->nomor_pelanggan = $request->input('nomor_pelanggan');
        $data->short_name = $request->input('short_name');
        $data->address = $request->input('address');
        $data->post_code = $request->input('post_code');
        $data->director_name = $request->input('director_name');
        $data->employee_name = $request->input('employee_name');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->mobile_phone = $request->input('mobile_phone');

        if($data->save()) {
            $render = $this->sendResponse($data, 'POST Customer', 200);
        } else {
            $render = $this->errorResponse('error', 200);
        }

        return $render;
    }

    public function update(Request  $request, $id) {

        $data = Customer::findOrFail($id);

        $data->code = $request->input('code');
        $data->name = $request->input('name');
        $data->nomor_pelanggan = $request->input('nomor_pelanggan');
        $data->short_name = $request->input('short_name');
        $data->address = $request->input('address');
        $data->post_code = $request->input('post_code');
        $data->director_name = $request->input('director_name');
        $data->employee_name = $request->input('employee_name');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->mobile_phone = $request->input('mobile_phone');

        if($data->save()) {
            $render = $this->sendResponse($data, 'PUT Customer', 200);
        }

        return $render;
    }

    public function delete($id) {

        $format = request()->format();

        $data = Customer::findOrFail($id);

        if($data->delete()) {
            switch ($format) {
                case 'json':
                default:
                    $render = $this->sendResponse($data, 'API DELETE CUSTOMERS SUCCESS', 200);
                    break;
            }
        } else {
            switch ($format) {
                case 'json':
                default:
                    $render = $this->errorResponse('ERROR', 'API DELETE CUSTOMERS', 401);
                    break;
            }
        }

        return $render;

    }


    public function show($id) {

        $data = Customer::findOrFail($id);

        var_dump($data); die;
    }

    //
}
