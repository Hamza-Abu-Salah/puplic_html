<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class UsersController extends Controller
{
    /**$user->syncRoles([$admin->id, $owner->id]);
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth_user = Auth::user()->id;
        $users = User::where('id','!=',$auth_user)->get();
        return view('AdminPanel.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::all();
        return view('AdminPanel.users.create', compact('role'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'status' => 'required'
        ],[
            'name.required' => 'الرجاء ادخال اسم المستخدم',
            'email.required' => 'الرجاء ادخال اميل المستخدم',
            'email.unique' => 'الاميل مستخدم !',
            'password.required' => 'الرجاء ادخال كلمة المرور',
            'status.required' => 'الرجاء اختيار الصلاحية',

            ]);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'url_admin' => route('login')
        ];
        \Mail::to('livekooratito@gmail.com')->send(new \App\Mail\NewUserSender($details));
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            $user->syncRoles($request->status);
            toastr()->success('تمت اضافة المستخدم بنجاح');
            return redirect()->route('users.index');
        }else{
            toastr()->success('ليس لديك صلاحية');
            return redirect()->route('users.index');
        }

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
        return redirect()->route('users.index');
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
        $user = User::find($id);
        if($user)
        {
            $role = Role::all();
            return view('AdminPanel.users.edit', compact('role','user'));
        }else{
            toastr()->error('المستخدم غير متوفر');
            return redirect()->route('users.index');
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
            'name' => 'required',
            'status' => 'required'
        ],[
            'name.required' => 'الرجاء ادخال اسم المستخدم',
            'status.required' => 'الرجاء اختيار الصلاحية',

            ]);
        $user = User::find($id);
            if($user)
            {
                if ($request->password) {
                    $details = [
                        'name' => $request->name,
                        'email' => $user->email,
                        'password' => $request->password,
                        'url_admin' => route('login')
                    ];
                }else{
                    $details = [
                        'name' => $request->name,
                        'email' => $user->email,
                        'password' => 'كلمة المرور كما هي لم يتم تعديلها',
                        'url_admin' => route('login')
                    ];
                }
                \Mail::to('livekooratito@gmail.com')->send(new \App\Mail\NewUserSender($details));
                $user->name =  $request->name;
                if($request->password){
                    $user->password =  Hash::make($request->password);
                }
                $user->update();
                $user->syncRoles($request->status);
                toastr()->success('تم تعديل المستخدم بنجاح');
                return redirect()->route('users.index');
            }else{
                toastr()->error('المستخدم غير متوفر');
                return redirect()->route('users.index');
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
        return redirect()->route('users.index');
    }
}
