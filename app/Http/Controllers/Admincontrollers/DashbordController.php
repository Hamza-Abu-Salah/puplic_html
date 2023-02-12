<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use App\supCategory;
use App\Category;
use App\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends BaseController
{
    //
    public function index()
    {
        return view('AdminPanel.index');
    }


    public function show(Request $request)
    {
    	$this->validate($request,[
            'tt' => 'required|mimes:text,txt',
        ],[
            'tt.required' => 'الرجاء ادخال اسم القسم',
            'tt.mimes' => 'الرجاء رفع ملف بامتداد  : txt - text',

            ]);

    	$filetito = fopen($request->tt,'r');
		while(!feof($filetito)){
			$contenttito = fgets($filetito);
            // $c = explode("<br>",$contenttito);
            // list($num) = $c;
            // $nume = explode("(",$num);
            // list($s,$de) = $nume;
            echo $de;

		}
		fclose($filetito);
    	dd();
    }
}
