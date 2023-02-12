@extends('AdminPanel._layout')
@section('title', 'مستخدم جديد')
@section('subtitle', 'مستخدم جديد')
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

        <p class="card-title-desc"> * اضافة مستخدم جديد</p>
<hr />
            <form class="custom-validation" action="{{ Route('users.store') }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">إسم المستخدم</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" placeholder="الرجاء اضافة اسم المستخدم" value="{{ old('name') }}" name="name" id="example-tel-input">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الاميل</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" placeholder="الرجاء اضافة الاميل " value="{{ old('email') }}" name="email" id="example-tel-input">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">كلمة المرور</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" placeholder="الرجاء اضافة كلمة مرور المستخدم " value="{{ old('password') }}" name="password" id="example-tel-input">
                    </div>
                </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">الصلاحية</label>
                <div class="col-sm-6">
                    <select class="form-control" multiple name="status[]">
                        @foreach($role as $r)
                         <option value="{{ $r->id }}" title="{{ $r->description }}">{{ $r->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="shitt">
            <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-plus"></i> اضافة</button>
            <button type="reset" id="shit" class="btn btn-outline-danger waves-effect waves-light"><i class="fas fa-redo-alt"></i> افراغ المدخلات</button>
            <a href="{{ Route('users.index') }}" id="shit" class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
            </div>
        </form>

    </div>
</div>
@endsection

