<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use App\Model\Laws;
use Illuminate\Http\Request;
use App\Model\Bages;
use Auth;
class lawsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $laws = Laws::withoutTrashed()->orderBy('id','desc')->get();
        return view('AdminPanel.laws.index',compact('laws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bag = Bages::withoutTrashed()->orderBy('id','desc')->get();
        return view('AdminPanel.laws.create',compact('bag'));
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
            'name' => 'required|unique:laws,name',
            'status' => 'required',
            'bag' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسم القانون',
            'name.unique' => 'الاسم مستخدم !',
            'status.required' => 'الرجاء اختيار حالة القانون',
            'bag.required' => 'الرجاء اختيار الحقبة',

            ]);
        $bage = new Laws();
        $bage->name = $request->name;
        $bage->status = $request->status?"1":"0";
        $bage->created_by = Auth::user()->id;
        $bage->bages_id = $request->bag;
        $bage->save();
        toastr()->success('تمت اضافة القانون بنجاح');
        return redirect()->route('laws.index');
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
        $laws = Laws::withoutTrashed()->find($id);
        $bag = Bages::withoutTrashed()->where('status','1')->orderBy('id','desc')->get();
        if($laws){
            return view('AdminPanel.laws.edit',compact('bag','laws'));
        }else{
            toastr()->warning('القانون المطلوب غير متوفر');
            return redirect()->route('laws.index');
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
            'name' => 'required|unique:laws,name,' . $id,
            'status' => 'required',
            'bag' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسم القانون',
            'name.unique' => 'الاسم مستخدم !',
            'status.required' => 'الرجاء اختيار حالة القانون',
            'bag.required' => 'الرجاء اختيار الحقبة',

            ]);
        $laws = Laws::withoutTrashed()->find($id);
        if ($laws) {
            $laws->name = $request->name;
            $laws->status = $request->status?"1":"0";
            $laws->created_by = Auth::user()->id;
            $laws->bages_id = $request->bag;
            $laws->update();
            toastr()->success('تم تعديل القانون بنجاح (' . $laws->name . ')');
            return redirect()->route('laws.index');
        }else{
            toastr()->warning('القانون المطلوب غير متوفر');
            return redirect()->route('laws.index');
        }
    }

    public function restore($id)
    {
        $laws = Laws::onlyTrashed()->find($id);
        if($laws){
            $laws = Laws::onlyTrashed()->findOrFail($id)->restore();
            toastr()->info('تم استعادة القانون بنجاح');
            return redirect()->route('laws.index');
        }else{
            toastr()->warning('القانون المطلوب غير متوفر');
            return redirect()->route('laws.index');
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
        $laws = Laws::onlyTrashed()->get();
        return view('AdminPanel.laws.trashed',compact('laws'));
    }

    public function trashe($id)
    {
        $laws = Laws::withoutTrashed()->find($id);

        if($laws){
            $laws = Laws::withoutTrashed()->findOrFail($id);
            $laws->dors()->forcedelete();
            $laws->delete();
            toastr()->error(' تم حذف القانون !');
            return redirect()->route('laws.index');
        }else{
            toastr()->warning('القانون المطلوب غير متوفر');
            return redirect()->route('laws.index');
        }

    }

    public function forcedelete($id)
    {
        $laws = Laws::onlyTrashed()->find($id);
        if($laws){
            $laws = Laws::onlyTrashed()->findOrFail($id);
            $laws->forceDelete();
            toastr()->error(' تم حذف القانون بشكل نهائي !');
            return redirect()->route('laws.trashed');
        }else{
            toastr()->warning('القانون المطلوب غير متوفر');
            return redirect()->route('laws.index');
        }

    }
}
