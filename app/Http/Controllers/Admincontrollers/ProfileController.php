<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    protected $path = 'public/profile/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminPanel.profile.index');
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
    public function edit(Request $request)
    {
        return view('AdminPanel.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = Auth::user();


        if ($request->name || $request->mobile) {

            $this->validate($request,[
                'name' => 'required',
                'mobile' => 'required',
            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'mobile.required' => 'هذا الحقل مطلوب',

            ]);

            $user->name = $request->input('name');
            $user->mobile = $request->input('mobile');
            $user -> save();
            toastr()->success('تم التعديل بنجاح');
            return redirect()->route('profile.index');
        }
        if ($request->password) {

            $this->validate($request,[
                'oldPassword' => 'required',
                'password' => 'required:confirmed',
            ],[
                'oldPassword.required' => 'هذا الحقل مطلوب',
                'password.required' => 'هذا الحقل مطلوب',
                'password.confirm' => 'كلمة السر الجديدة غير متطابقة',

            ]);

            if (Hash::check($request->oldPassword, $user->password)) {
                if ($request->oldPassword == $request->password) {
                    toastr()->error('يرجى كتابة كلمة مرور مختلفة');
                    return back();
                } else {
                    $user -> password = Hash::make($request -> password);
                    $user -> save();
                    toastr()->success('تم تغيير كلمة المرور بنجاح، يرجى تسجيل الدخول مرة أخرى');
                    return redirect()->route('profile.index');
                }
            } else {
                toastr()->error('كلمة المرور غير متطابقة، يرجى المحاولة مرة أخرى');
                return back();
            }
        }
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
