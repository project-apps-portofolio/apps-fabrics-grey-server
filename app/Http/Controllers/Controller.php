<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function sendResponse($result, $message) {
        $result = [
            'massage' => $message,
            'result' => $result,
            'code' => 200,
        ];

        return response()->json($result);
    }
}
