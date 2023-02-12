<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $social = Social::find(1);
        return view('AdminPanel.social.index', compact('social'));
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
        $social = new Social();
        $social->fb = $request->input('fb');
        $social->fb_link = $request->input('fb_link');
        $social->insta = $request->input('insta');
        $social->insta_link = $request->input('insta_link');
        $social->tw = $request->input('tw');
        $social->tw_link = $request->input('tw_link');
        $social->tlg = $request->input('tlg');
        $social->tlg_link = $request->input('tlg_link');
        $social->save();
        toastr()->success('تم الحفظ');
        return redirect(route('social.index'));
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
        $social = Social::find(1);
        $social->fb = 'فيسبوك';
        $social->fb_link = $request->input('fb_link');
        $social->insta = 'انستجرام';
        $social->insta_link = $request->input('insta_link');
        $social->tw = 'تويتر';
        $social->tw_link = $request->input('tw_link');
        $social->tlg = 'تيلجرام';
        $social->tlg_link = $request->input('tlg_link');
        $social->save();
        toastr()->success('تم التعديل');
        return redirect(route('social.index'));
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
