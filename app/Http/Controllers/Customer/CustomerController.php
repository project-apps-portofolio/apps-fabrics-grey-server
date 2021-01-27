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
        $req = $request->all();

        $data = new Customer($req);

        if($data->save()) {
            $render = $this->sendResponse($data, 'POST Customer', 200);
        }

        return $render;
    }

    public function update(Request  $request, $id) {

    }

    public function delete($id) {

    }

    //
}
