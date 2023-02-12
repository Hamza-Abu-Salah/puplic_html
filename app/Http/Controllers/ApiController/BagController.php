<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\Bages;

class BagController extends Controller
{
    public function send()
    {
        $bags = Bages::all();
            if ($bags->count()) {
                return new JsonResponse([
                    'data' => [
                        'message' => $bags,
                        'status' => 200
                    ]
                ]);
            } else {
                return new JsonResponse([
                    'data' => [
                        'message' => 'لا يوجد بيانات لعرضها',
                        'status' => 401
                    ]
                ]);
            }
    }
}
