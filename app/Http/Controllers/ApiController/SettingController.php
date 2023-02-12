<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    public function send() {
        $setting = Setting::find(1);
        if ($setting) {
            return new JsonResponse([
                'data' => [
                    'message' => $setting,
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
