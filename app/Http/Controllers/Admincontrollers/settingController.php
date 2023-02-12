<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::find(1);
        return view('AdminPanel.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $setting = new Setting();
        $setting->mode = $request->input('mode');
        $setting->whatsup = $request->input('whatsup');
        $setting->facebook = $request->input('facebook');
        $setting->email = $request->input('email');
        $setting->save();
        toastr()->success('تم الحفظ');
        return redirect(route('setting.index'));
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
    public function edit(Request $request, $id)
    {
        //
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
        $setting = Setting::find(1);
        $setting->mode = $request->input('mode');
        $setting->whatsup = $request->input('whatsup');
        $setting->facebook = $request->input('facebook');
        $setting->email = $request->input('email');
        $setting->save();
        toastr()->success('تم التعديل');
        return redirect(route('setting.index'));
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
