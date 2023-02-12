@extends('AdminPanel._layout')
@section('title', 'معلومات التواصل')
@section('subtitle', 'معلومات التواصل')
@push('css')
    <style>
        #shit {
            cursor: pointer;
            padding: .375rem .75rem;
        }

        #shitt {
            display: table;
            margin: 0 auto;
        }

        #shitt button {
            margin-left: 5px;
        }
    </style>
@endpush
@section('content')


    @if(isset($social))
        <div class="card">
            <div class="card-body">
                <h1 class="font-size-32 mb-3"><i class="fas fa-info-circle font-size-32"></i> تعديل معلومات التواصل
                </h1>
                <hr/>
                <form class="custom-validation"
                      action="{{ Route('social.update', $social->id) }}"
                      method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">{{ $social->fb }}</label>

                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="{{ $social->fb_link }}"
                                   placeholder="الرجاء اضافة رابط الفيسبوك" name="fb_link"
                                   id="example-tel-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">{{ $social->tw }}</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="{{ $social->tw_link }}"
                                   placeholder="الرجاء اضافة رابط التويتر" name="tw_link"
                                   id="example-tel-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">{{ $social->insta }}</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="{{ $social->insta_link }}"
                                   placeholder="الرجاء اضافة رابط الانستجرام" name="insta_link"
                                   id="example-tel-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">{{ $social->tlg }}</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="{{ $social->tlg_link }}"
                                   placeholder="الرجاء اضافة رابط التلجرام" name="tlg_link"
                                   id="example-tel-input">
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
                <h1 class="font-size-32 mb-3"><i class="fas fa-info-circle font-size-32"></i> تعديل معلومات التواصل
                </h1>
                <hr/>
                <form class="custom-validation"
                      action="{{ Route('social.store') }}"
                      method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">فيسبوك</label>

                        <div class="col-sm-6">
                            <input class="form-control" type="text"
                                   placeholder="الرجاء اضافة رابط الفيسبوك" name="fb_link"
                                   id="example-tel-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">تويتر</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"
                                   placeholder="الرجاء اضافة رابط التويتر" name="tw_link"
                                   id="example-tel-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">انستجرام</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"
                                   placeholder="الرجاء اضافة رابط الانستجرام" name="insta_link"
                                   id="example-tel-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">تلجرام</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"
                                   placeholder="الرجاء اضافة رابط التلجرام" name="tlg_link"
                                   id="example-tel-input">
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

