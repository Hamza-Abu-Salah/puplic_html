<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use App\Model\Door;
use App\Model\Laws;
use Illuminate\Http\Request;
use Auth;

class doorsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(auth()->user()->hasRole('gg'));
        //
        $dors = Door::withoutTrashed()->orderBy('id','desc')->get();
        return view('AdminPanel.doors.index',compact('dors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $laws = Laws::where('status','1')->withoutTrashed()->get();
        return view('AdminPanel.doors.create',compact('laws'));
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
            'name' => 'required|unique:doors,name',
            'status' => 'required',
            'laws' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسم الباب',
            'name.unique' => 'الاسم مستخدم !',
            'status.required' => 'الرجاء اختيار حالة الباب',
            'laws.required' => 'الرجاء اختيار القانون للباب',

            ]);
        $bage = new Door();
        $bage->name = $request->name;
        $bage->status = $request->status?"1":"0";
        $bage->user_id = Auth::user()->id;
        $bage->laws_id = $request->laws;
        $bage->save();
        toastr()->success('تمت اضافة الباب بنجاح');
        return redirect()->route('door.index');
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
        return redirect()->route('door.index');
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
        $door = Door::withoutTrashed()->find($id);
        if($door)
        {
            $laws = Laws::where('status','1')->withoutTrashed()->get();
            return view('AdminPanel.doors.edit',compact('door','laws'));
        }else{
            toastr()->error('الباب غير متوفر !');
            return redirect()->route('door.index');
        }
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
        $this->validate($request,[
            'name' => 'required|unique:doors,name,' . $id,
            'status' => 'required',
            'laws' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسم الباب',
            'name.unique' => 'الاسم مستخدم !',
            'status.required' => 'الرجاء اختيار حالة الباب',
            'laws.required' => 'الرجاء اختيار القانون للباب',

            ]);
        $bage = Door::withoutTrashed()->find($id);
        if($bage)
        {
            $bage->name = $request->name;
            $bage->status = $request->status?"1":"0";
            $bage->user_id = Auth::user()->id;
            $bage->laws_id = $request->laws;
            $bage->update();
            toastr()->success('تمت تعديل الباب بنجاح');
            return redirect()->route('door.index');
        }else{
            toastr()->error('الباب غير متوفر !');
            return redirect()->route('door.index');
        }
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
        return redirect()->route('door.index');
    }

    public function forcedelete($id)
    {
        $bag = Door::find($id);
        if($bag){
            $bag = Door::find($id)->forceDelete();
            toastr()->error(' تم حذف الباب بشكل نهائي !');
            return redirect()->route('door.index');
        }else{
            toastr()->warning('الباب المطلوب غير متوفر');
            return redirect()->route('door.index');
        }
    }
}
