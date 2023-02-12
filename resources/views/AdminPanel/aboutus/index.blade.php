@extends('AdminPanel._layout')
@push('css')
    <style>
        .fas {
            margin-left: 10px;
        }
    </style>
@endpush
@section('title', 'حول')
@section('subtitle', 'حول')
@section('content')
    @if(isset($about))
        <section class="my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="home-wrapper text-center">
                            <img class="rounded" src="{{$about->file_path}}" alt="logo" height="30"/>
                            <h3 class="mt-4 font-size-40 text-center">{{ $about->name }}</h3>
                            <br/>

                            <div class="row">
                                <div class="text-center col-md-12">
                                    <div class="card mt-12">
                                        <div class="card-body">
                                            <i class="mdi mdi-lightbulb-on font-size-32 mb-3"></i>
                                            <h6 class="text-uppercase font-size-20 font-weight-bold mt-3">
                                                فكرة وادارة</h6>
                                            <p class="text-muted font-size-15 font-weight-bold mt-3">{{$about->major}}</p>
                                            <p class="text-muted font-size-15 font-weight-bold mt-3">{{$about->majordesc}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-md-12">
                                    <div class="card mt-12">
                                        <div class="card-body">
                                            <i class="fas fa-users font-size-32 mb-3"></i>
                                            <h6 class="text-uppercase mt-3 font-size-20 font-weight-bold">
                                                بالشراكة مع</h6>
                                            <p class="text-muted mt-3 font-size-10 font-weight-bold">{{$about->company}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-md-12">
                                    <div class="card mt-12">
                                        <div class="card-body">
                                            <i class="mdi mdi-share-variant font-size-32 mb-3"></i>
                                            <p class="text-muted mt-3"><i class="fas fa-envelope font-size-20"></i><a
                                                    href="mailto:{{$about->email}}"
                                                    class="text-decoration-underline font-size-15">{{$about->email}}</a></p>
                                            <p class="text-muted mt-3"><i class="fas fa-phone font-size-20"></i><a
                                                    href="tel:{{$about->number}}"
                                                    class="text-decoration-underline font-size-15">{{$about->number}}</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center col-md-12">
                                    <div class="card mt-12">
                                        <div class="card-body">
                                            <i class="mdi mdi-police-badge font-size-32 mb-3"></i>
                                            <h6 class="text-uppercase mt-3 font-size-20">
                                                حقوق الطبع والنشر</h6>
                                            <p class="text-muted mt-3 font-size-10 font-weight-bold">{{$about->privacy}}</p>
                                            <p class="text-muted mt-3 font-size-10 font-weight-bold">{{$about->privacy2}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center col-md-12">
                                <div class="card mt-12">
                                    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary"
                                       id="example-tel-input" style="color: white">تعديل</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="card">
            <div class="card-body">
                <h1 class="font-size-32 mb-3"><i class="fas fa-info-circle font-size-32"></i> تعديل حول في التطبيق </h1>

                <hr/>
                <form class="custom-validation" action="{{ Route('about.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">تعديل الصورة</label>
                        <div class="col-sm-6">
                            <input type="file" name="logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة اسم التطبيق" name="name"
                                   id="example-tel-input" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">فكرة وادارة</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة الاسم" name="major"
                                   id="example-tel-input" required>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة المستوى التعليميلي"
                                   name="majordesc" id="example-tel-input" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">بالشراكة مع</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة اسم الشركاء"
                                   name="company" id="example-tel-input" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة عنوان البريد الالكتروني"
                                   value="" name="email" id="example-tel-input" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة رقم الهاتف" value=""
                                   name="number" id="example-tel-input" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">الحقوق</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" placeholder="الرجاء اضافة حقوق الحفظ" name="privacy"
                                   id="example-tel-input" required>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" placeholder="مجاز ومرخص" name="privacy2"
                                   id="example-tel-input" required>
                        </div>
                    </div>


                    <div id="shitt">
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
