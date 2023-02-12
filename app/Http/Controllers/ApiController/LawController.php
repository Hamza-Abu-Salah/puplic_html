<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Model\laws;
use Illuminate\Http\JsonResponse;

class LawController extends Controller
{

    public function send()
    {
        $laws = laws::all();
        if ($laws->count()) {
            return new JsonResponse([
                'data' => $laws,
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
