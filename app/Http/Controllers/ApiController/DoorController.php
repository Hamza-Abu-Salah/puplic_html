<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Model\Door;
use Illuminate\Http\JsonResponse;

class DoorController extends Controller
{


    public function send()
    {
        $doors = Door::all();
        if ($doors->count()) {
            return new JsonResponse([
                'data' => $doors,
                'status' => 200
            ]);
        } else {
            return new JsonResponse([
                'data' => 'لا يوجد بيانات لعرضها',
                'status' => 401
            ]);
        }
    }
}
