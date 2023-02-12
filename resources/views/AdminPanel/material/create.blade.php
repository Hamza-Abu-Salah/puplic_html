@extends('AdminPanel._layout')
@section('title', 'اضافة مادة جديدة')
@section('subtitle', 'اضافة مادة جديدة')
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

        <p class="card-title-desc"> * اضافة مادة جديدة</p>
<hr />
            <form class="custom-validation" enctype="multipart/form-data" action="{{ Route('material.store') }}" method="post">
                @csrf

                    <div class="form-group mb-0">
                        <label class="col-sm-2 col-form-label">ملف المادة</label>
                        <input name="subject" type="file" class="filestyle" data-input="false" data-buttonname="btn-secondary" id="filestyle-1" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                        <div class="bootstrap-filestyle input-group col-sm-6">
                            <div name="filedrag" style="position: absolute; width: 100%; height: 36px; z-index: -1;">
                                </div>
                                <span class="group-span-filestyle " tabindex="0">
                                    <label for="filestyle-1" style="margin-bottom: 0;" class="btn btn-secondary ">
                                        <span class="buttonText">انقر هنا لاختيار ملف المادة</span>
                                    </label>
                                </span>
                            </div>
                    </div>
                <hr />

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الباب</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="door">
                            <option value="">الرجاء اختيار الباب</option>
                            @foreach ($door as $l)
                                <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">الحالة</label>
                <div class="col-sm-6">
                    <select class="form-control" name="status">
                        <option value="">الرجاء اختيار حالة المادة</option>
                        <option value="1">فعال</option>
                        <option value="0">غير فعال</option>
                    </select>
                </div>
            </div>
            <div id="shitt">
            <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-plus"></i> اضافة</button>
            <button type="reset" id="shit" class="btn btn-outline-danger waves-effect waves-light"><i class="fas fa-redo-alt"></i> افراغ المدخلات</button>
            <a href="{{ Route('material.index') }}" id="shit" class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
            </div>
        </form>

    </div>
</div>
@endsection

