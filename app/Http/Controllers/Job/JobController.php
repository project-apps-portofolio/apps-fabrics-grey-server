<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Traits\ApiResponser;

class JobController extends Controller
{

    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
    
        $data = Jobs::all();
        
        return $this->sendResponse($data, 'GET Jobs', 200);
    }

    public function store(Request $request) {

        $req = $request->all();

        // var_dump($req); die;

        $data = new Jobs($req);

        if($data->save()) {
            $render = $this->sendResponse($data, 'POST Jobs');
        }

        return $render;
        
    }

    //
}
