<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Test extends Controller {

    public function index() {
        $response = [
            'status' => true,
            'data' => "abc",
            'msg' => "aaaa"
        ];
        return response()->json($response, 200);
    }
}