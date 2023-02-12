<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AboutUS;
use Illuminate\Support\Facades\Schema;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $path = 'public/image/about';
    public function index()
    {
        $about = AboutUS::find(1);
        if ($about) {
            return view('AdminPanel.aboutus.index', compact('about'));
        } else {
            $abouts = AboutUS::all();
            if ($abouts) {
                AboutUS::all()->each->delete();
                toastr()->error('لا يوجد معلومات بهذه الصفحة، يرجى ادخال المعلومات هنا');
                return view('AdminPanel.aboutus.index');
            } else {
                if ($abouts->count() > 1) {
                    AboutUS::all()->each->delete();
                    toastr()->info('تم ايجاد اكثر من هدف، يرجى اعادة ادخال المعلومات هنا مرة اخرى');
                    return redirect(route('about.index'));
                } else {
                    toastr()->info('يرجى ادخال معلومات لعرضها');
                    return redirect(route('about.index'));
                }
            }
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $about = new AboutUS();
        if ($request->file('logo')) {

            $request->validate([
                'image' => 'mimes:png'
            ]);
            $extension = $request->logo -> getClientOriginalExtension();
            $aboutname = time() . '.' . $extension;
            $request->logo -> storeAs($this->path,$aboutname);
            $about->logo = $aboutname;
            $about->file_path = '/storage/image/about/' . $aboutname;
        }
        $about->id = 1;
        $about->name = $request->input('name');
        $about->major = $request->input('major');
        $about->majordesc = $request->input('majordesc');
        $about->company = $request->input('company');
        $about->email = $request->input('email');
        $about->number = $request->input('number');
        $about->privacy = $request->input('privacy');
        $about->privacy2 = $request->input('privacy2');
        $about->save();
        toastr()->success('تم الحفظ');
        return redirect(route('about.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 1) {
            $about = AboutUS::find(1);
            return view('AdminPanel.aboutus.edit', compact('about'));
        } else {
            return view('AdminPanel.aboutus.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $about = AboutUS::find(1);

        if ($request->hasFile('logo')) {
            $request->validate([
                'image' => 'mimes:png'
            ]);

            $extension = $request->logo -> getClientOriginalExtension();
            $aboutname = time() . '.' . $extension;
            $request->logo -> storeAs($this->path,$aboutname);
            $about->logo = $aboutname;
            $about->file_path = '/storage/image/about/' . $aboutname;
        }
        $about->name = $request->input('name');
        $about->major = $request->input('major');
        $about->majordesc = $request->input('majordesc');
        $about->company = $request->input('company');
        $about->email = $request->input('email');
        $about->number = $request->input('number');
        $about->privacy = $request->input('privacy');
        $about->privacy2 = $request->input('privacy2');
        $about->update();
        toastr()->success('تم التعديل');
        return redirect(route('about.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
