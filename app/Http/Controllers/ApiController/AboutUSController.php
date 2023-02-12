<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Model\AboutUS;
use Illuminate\Http\JsonResponse;

class AboutUSController extends Controller
{
    public function send()
    {
        //dd($request->all());
        $contact = AboutUS::find(1);
        if($contact) {
            return new JsonResponse([
                'data'=>[
                    'message'=> $contact,
                    'status' => 200,
                ],
            ]);
        } else {
            return new JsonResponse([
                'data'=>[
                    'message'=> 'لا يوجد بيانات لعرضها',
                    'status' => 401,
                ],
            ]);
        }
    }
}
