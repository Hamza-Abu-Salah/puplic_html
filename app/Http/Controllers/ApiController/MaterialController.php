<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Model\Materials;
use Illuminate\Http\JsonResponse;

class MaterialController extends Controller
{
    public function send()
    {
        $materials = Materials::all();
        if ($materials->count()) {
            return new JsonResponse([
                'data' => $materials,
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
