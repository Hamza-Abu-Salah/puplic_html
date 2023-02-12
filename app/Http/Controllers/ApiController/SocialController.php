<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Http\JsonResponse;

class SocialController extends Controller
{
    public function send() {
        $social = Social::find(1);
        if ($social) {
            return new JsonResponse([
                'data' => [
                    'message' => $social,
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
