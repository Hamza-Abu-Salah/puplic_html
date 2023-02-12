@extends('AdminPanel._layout')
@section('title', 'الاعدادات')
@section('subtitle', 'الاعدادات')
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


    @if(isset($setting))
    <div class="card">
        <div class="card-body">
            <h1 class="font-size-32 mb-3"><i class="fas fa-cog font-size-32"></i> تعديل الاعدادات </h1>
            <hr/>
            <form class="custom-validation" action="{{ Route('setting.update', $setting->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">حالة التطبيق</label>

                    <div class="col-sm-6">
                        <select class="form-control" type="text" name="mode"
                               id="example-tel-input" required>
                            <option value="{{ $setting->mode == 0? 0 : 1 }}" >{{ $setting->mode == 0? 'مغلق' : 'متاح' }}</option>
                            <option value="{{ $setting->mode == 0? 1 : 0 }}" >{{ $setting->mode == 0? 'متاح' : 'مغلق' }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">واتساب</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" value="{{ $setting->whatsup }}" placeholder="الرجاء اضافة رقمك الواتساب" name="whatsup"
                               id="example-tel-input" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">فيسبوك</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" value="{{ $setting->facebook }}" placeholder="الرجاء اضافة رابط الفيسبوك الخاص بك" name="facebook"
                               id="example-tel-input" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" value="{{ $setting->email }}" placeholder="الرجاء اضافة الايميل الخاص بك" name="email"
                               id="example-tel-input" required>
                    </div>
                </div>


                <div id="shitt" class="col-3">
                    <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i
                            class="fas fa-edit"></i> حفظ
                    </button>
                    <a href="{{ Route('index') }}" id="shit"
                       class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
                </div>
            </form>

        </div>
    </div>
    @else
        <div class="card">
            <div class="card-body">
                <h1 class="font-size-32 mb-3"><i class="fas fa-cog font-size-32"></i> تعديل الاعدادات </h1>
                <hr/>
                <form class="custom-validation" action=" {{Route('setting.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">حالة التطبيق</label>

                        <div class="col-sm-6">
                            <select class="form-control" type="text" name="mode"
                                    id="example-tel-input" required>
                                <option value="0" >مغلق</option>
                                <option value="1" >متاح</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">واتساب</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة رقمك الواتساب" name="whatsup"
                                   id="example-tel-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">فيسبوك</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة رابط الفيسبوك الخاص بك" name="facebook"
                                   id="example-tel-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة الايميل الخاص بك" name="email"
                                   id="example-tel-input" required>
                        </div>
                    </div>


                    <div id="shitt" class="col-3">
                        <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i
                                class="fas fa-edit"></i> حفظ
                        </button>
                        <a href="{{ Route('index') }}" id="shit"
                           class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
                    </div>
                </form>

            </div>
        </div>
    @endif
@endsection

