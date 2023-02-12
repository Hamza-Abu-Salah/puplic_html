<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Model\ContactUS;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactusController extends Controller
{
    //
    public function send(Request $request)
    {
        $validator = \Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'description' => 'required',

        ]);
        if ($validator->fails()) {
            return new JsonResponse([
                'data'=>[
                    'message'=> 'الرجاء التحقق من البيانات المدخلة',
                    'status' => 401,
                ],
            ]);
        }
        //dd($request->all());
        $contact = new ContactUS();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->description = $request->description;
        $contact->save();
        if($contact)
            return new JsonResponse([
                'data'=>[
                    'message'=> 'تم ارسال البيانات يا زعيم العرب',
                    'status' => 200,
                ],
            ]);
    }
}
