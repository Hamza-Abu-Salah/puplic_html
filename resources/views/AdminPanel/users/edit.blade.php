@extends('AdminPanel._layout')
@section('title', 'تعديل المستخدم')
@section('subtitle', 'تعديل المستخدم')
@push('css')
<style>
    #shit {
        cursor: pointer;
        padding: .375rem .75rem;
    }

    #shitt{
        display: table;
        margin: 0 auto;
    }

    #shitt button {
        margin-left: 5px;
    }
    </style>
@endpush
@section('content')

<div class="card">
    <div class="card-body">

        <p class="card-title-desc"> * تعديل المستخدم</p>
<hr />
            <form class="custom-validation" action="{{ Route('users.update',$user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">إسم المستخدم</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" placeholder="الرجاء اضافة اسم المستخدم" value="{{ $user->name }}" name="name" id="example-tel-input">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الاميل</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" placeholder="الرجاء اضافة الاميل " value="{{ $user->email }}" name="email" id="example-tel-input">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">كلمة المرور</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" placeholder="الرجاء اضافة كلمة مرور المستخدم " name="password" id="example-tel-input">
                    </div>
                </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">الصلاحية</label>
                <div class="col-sm-6">
                    <select class="form-control" multiple name="status[]">
                        @foreach($role as $r)
                        @php
                            $ro = DB::table('role_user')->where('user_id',$user->id)->get();
                        @endphp
                            @foreach($ro as $re)
                                <option {{ $re->role_id == $r->id ? 'selected' : '' }} value="{{ $r->id }}" title="{{ $r->description }}">{{ $r->display_name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="shitt">
            <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-edit"></i> تعديل</button>
             <a href="{{ Route('users.index') }}" id="shit" class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
            </div>
        </form>

    </div>
</div>
@endsection

