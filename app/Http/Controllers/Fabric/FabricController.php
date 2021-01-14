<?php

namespace App\Http\Controllers\Fabric;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use App\Traits\ApiResponser;

class FabricController extends Controller
{

    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fabric = Fabric::FabricJson();
    }

    public function index() {
        $result = $this->fabric;
        // return $this->sendResponse(['data' => $result], 'Result Get Fabric');
        return $this->successResponse(['data' => $result], 'GET Success');
    }
}
