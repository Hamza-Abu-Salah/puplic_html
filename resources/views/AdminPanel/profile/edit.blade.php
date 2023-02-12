@extends('AdminPanel._layout')
@section('title', 'الملف الشخصي')
@section('subtitle', 'تعديل الملف الشخصي')
@section('content')


    <div class="card">
        <div class="card-body">
            <h1 class="font-size-32 mb-3"><i class="fas fa-info-circle font-size-32"></i> تعديل ملفك الشخصي </h1>
            <hr/>
            <form class="custom-validation" action="{{ route('profile.update') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">تعديل صورة بروفايلك</label>
                    <div class="col-sm-6">
                        <input type="file" name="avatar">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الاسم</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" value="{{ Auth::user()->name }}" placeholder="الرجاء اضافة اسمك" name="name"
                               id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" value="{{ Auth::user()->mobile }}" placeholder="الرجاء اضافة رقم هاتف" name="mobile"
                               id="example-tel-input" required>
                    </div>
                </div>

                <div id="shitt" class="col-3">
                    <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i
                            class="fas fa-edit"></i> حفظ
                    </button>
                    <a href="{{ Route('profile.index') }}" id="shit"
                       class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
                </div>
            </form>

        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h1 class="font-size-32 mb-3"><i class="fas fa-lock font-size-32"></i> تعديل كلمة المرور </h1>
            <hr/>
            <form class="custom-validation" action="{{ route('profile.update') }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">كلمة السر الحالية</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" placeholder="الرجاء اضافة كلمة السر الحالية" name="oldPassword"
                               id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">كلمة السر الجديدة</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" placeholder="الرجاء اضافة كلمة السر الجديد" name="password"
                               id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">كلمة السر الجديدة</label>
                    <div class="col-sm-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="الرجاء تأكيد كلمة السر الجديد"
                               id="example-tel-input" required>
                    </div>
                </div>

                <div id="shitt" class="col-3">
                    <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i
                            class="fas fa-edit"></i> حفظ
                    </button>
                    <a href="{{ Route('profile.index') }}" id="shit"
                       class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
                </div>
            </form>

        </div>
    </div>
@endsection

