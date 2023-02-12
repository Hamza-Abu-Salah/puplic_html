<?php

namespace App\Http\Controllers\Admincontrollers;

use Illuminate\Http\Request;
use App\Model\Bages;
use Auth;

class BagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bags = Bages::withoutTrashed()->orderBy('id','desc')->get();
        return view('AdminPanel.bag.index',compact('bags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('AdminPanel.bag.create');
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
            'name' => 'required|unique:bages,name',
            'status' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسم القسم',
            'name.unique' => 'الاسم مستخدم !',
            'status.required' => 'الرجاء اختيار حالة الحقبة',

            ]);
        $bage = new Bages();
        $bage->name = $request->name;
        $bage->status = $request->status?"1":"0";
        $bage->created_by = Auth::user()->id;
        $bage->save();
        toastr()->success('تمت اضافة الحقبة بنجاح');
        return redirect()->route('bag.index');
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
        return redirect()->route('bag.index');
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
        $bag = Bages::withoutTrashed()->find($id);
        if($bag){
            return view('AdminPanel.bag.edit',compact('bag'));
        }else{
            toastr()->warning('الحقبة المطلوبة غير متوفرة');
            return redirect()->route('bag.index');
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
            'name' => 'required|unique:bages,name,'.$id,
            'status' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسم القسم',
            'name.unique' => 'الاسم مستخدم !',
            'status.required' => 'الرجاء اختيار حالة الحقبة',

            ]);
        $bag = Bages::withoutTrashed()->find($id);
        if ($bag) {
            $bag->name = $request->name;
            $bag->status = $request->status?"1":"0";
            $bag->created_by = Auth::user()->id;
            $bag->update();
            toastr()->success('تمت تعديل الحقبة بنجاح (' . $bag->name . ')');
            return redirect()->route('bag.index');
        }else{
            toastr()->warning('الحقبة المطلوبة غير متوفرة');
            return redirect()->route('bag.index');
        }
    }

    public function restore($id)
    {
        $bag = Bages::onlyTrashed()->find($id);
        if($bag){
            $bag = Bages::onlyTrashed()->findOrFail($id)->restore();
            toastr()->info('تم استعادة الحقبة بنجاح');
            return redirect()->route('bag.index');
        }else{
            toastr()->warning('الحقبة المطلوبة غير متوفرة');
            return redirect()->route('bag.index');
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
        return redirect()->route('bag.index');
    }

    public function trashed()
    {
        $bags = Bages::onlyTrashed()->get();
        return view('AdminPanel.bag.trashed',compact('bags'));
    }

    public function trashe($id)
    {
        $bag = Bages::withoutTrashed()->find($id);
        if($bag){
            $bag = Bages::find($id);
            $bag->laws()->forcedelete();
            $bag->delete();
            toastr()->error(' تم حذف الحقبة !');
            return redirect()->route('bag.index');
        }else{
            toastr()->warning('الحقبة المطلوبة غير متوفرة');
            return redirect()->route('bag.index');
        }

    }

    public function forcedelete($id)
    {
        $bag = Bages::onlyTrashed()->find($id);
        if($bag){
            $bag = Bages::onlyTrashed()->findOrFail($id)->forceDelete();
            toastr()->error(' تم حذف الحقبة بشكل نهائي !');
            return redirect()->route('bag.trashed');
        }else{
            toastr()->warning('الحقبة المطلوبة غير متوفرة');
            return redirect()->route('bag.index');
        }

    }
}
