<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Device;
use App\Http\Controllers\Controller;
use App\Model\ContactUS;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required:email',
            'type' => 'required',
            'description' => 'required',
        ],[
            'name.required' => 'الرجاء ادخال اسمك',
            'email.required' => 'الرجاء ادخال البريد الخاص بك',
            'type.required' => 'الرجاء ادخال النوع',
            'description.required' => 'الرجاء ادخال الوصف',

        ]);
        $agent = new \Jenssegers\Agent\Agent;
        $isMobile = $agent->isMobile();
        $isDesktop = $agent->isDesktop();
        $isTablet = $agent->isTablet();
        $contact = new ContactUS;
        $device = new Device;
        $contact -> name = $request -> input('name');
        $contact -> email = $request -> input('email');
        $contact -> type = $request -> input('type');
        $contact -> description = $request -> input('description');
        $device -> isMobile += $isMobile;
        $device -> isDesktop += $isDesktop;
        $device -> isTablet += $isTablet;
        $contact -> save();
        $device-> save();
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
