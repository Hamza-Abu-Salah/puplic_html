<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use App\Model\Door;
use Illuminate\Http\Request;
use App\Model\Materials;
use Auth;

class materialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materials = Materials::orderBy('id','desc')->get();
        return view('AdminPanel.material.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $door = Door::withoutTrashed()->where('status','1')->orderBy('id','desc')->get();
        return view('AdminPanel.material.create',compact('door'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'subject' => 'required|mimes:text,txt',
            'status' => 'required|in:0,1',
            'door' => 'required'
        ],[
            'subject.required' => 'الرجاء ادخال اسم القسم',
            'subject.mimes' => 'الرجاء رفع ملف بامتداد  : txt - text',
            'status.required' => 'الرجاء اختيار حالة المادة',
            'door.required' => 'الرجاء اختيار باب المادة',

            ]);
        $filetito = @fopen($request->subject,'r');
        while(!feof($filetito)){
            $contenttito = fgets($filetito, 999999);
            list($title,$descr)=explode(";",$contenttito);
            $material = new Materials();
            $material->title = $title;
            $material->content = $descr;
            $material->status = $request->status?"1":"0";
            $material->created_by = Auth::user()->id;
            $material->door_by = $request->door;
            $material->save();
        }
		fclose($filetito);
        toastr()->success('تمت اضافة المادة بنجاح');
        return redirect()->route('material.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $door = Door::withoutTrashed()->where('status','1')->orderBy('id','desc')->get();
        $material = Materials::find($id);
        return view('AdminPanel.material.edit',compact('door','material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
