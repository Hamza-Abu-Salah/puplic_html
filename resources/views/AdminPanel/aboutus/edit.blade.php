@extends('AdminPanel._layout')
@section('title', 'من نحن')
@section('subtitle', 'تعديل من نحن')
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
            <h1 class="font-size-32 mb-3"><i class="fas fa-info-circle font-size-32"></i> تعديل من نحن بالتطبيق </h1>
            <hr/>
            <form class="custom-validation" enctype="multipart/form-data" action="{{ Route('about.update', $about->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">تعديل الشعار</label>
                    <div class="col-sm-6">
                        <input type="file" name="logo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الاسم</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" value="{{ $about->name }}" placeholder="الرجاء اضافة اسم التطبيق" name="name"
                               id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">فكرة وادارة</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" value="{{ $about->major }}" placeholder="الرجاء اضافة الاسم" name="major"
                               id="example-tel-input" required>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" value="{{ $about->majordesc }}" type="text" placeholder="الرجاء اضافة المستوى التعليميلي"
                               name="majordesc" id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">بالشراكة مع</label>
                    <div class="col-sm-6">
                        <input class="form-control" value="{{ $about->company }}" type="text" placeholder="الرجاء اضافة اسم الشركاء"
                               name="company" id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                    <div class="col-sm-6">
                        <input class="form-control" value="{{ $about->email }}" type="text" placeholder="الرجاء اضافة عنوان البريد الالكتروني"
                               value="" name="email" id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                    <div class="col-sm-6">
                        <input class="form-control" value="{{ $about->number }}" type="text" placeholder="الرجاء اضافة رقم الهاتف" value=""
                               name="number" id="example-tel-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الحقوق</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" value="{{ $about->privacy }}" placeholder="الرجاء اضافة حقوق الحفظ" name="privacy"
                               id="example-tel-input" required>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" value="{{ $about->privacy2 }}" placeholder="مجاز ومرخص" name="privacy2"
                               id="example-tel-input" required>
                    </div>
                </div>


                <div id="shitt" class="col-3">
                    <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i
                            class="fas fa-edit"></i> حفظ
                    </button>
                    <a href="{{ Route('about.index') }}" id="shit"
                       class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
                </div>
            </form>

        </div>
    </div>
@endsection

