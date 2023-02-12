@extends('AdminPanel._layout')
@section('title', 'تعديل المادة')
@section('subtitle', 'تعديل المادة')
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

        <p class="card-title-desc"> * تعديل المادة : <b style="color:red">{{ $material->title }}</b></p>
<hr />
            <form class="custom-validation" action="{{ Route('material.update',$material->id) }}" method="post">
                @csrf
                @method('put')
                <textarea id="elm1" name="area">{{ $material->content }}</textarea>
                <hr />

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الباب</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="door">
                            <option value="">الرجاء اختيار الباب</option>
                            @foreach ($door as $l)
                                <option {{ $l->id == $material->door_by ? 'selected' : '' }} value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">الحالة</label>
                <div class="col-sm-6">
                    <select class="form-control" name="status">
                        <option value="">الرجاء اختيار حالة المادة</option>
                        <option {{ $material->status == '1' ? 'selected' : '' }} value="1">فعال</option>
                        <option {{ $material->status == '0' ? 'selected' : '' }} value="0">غير فعال</option>
                    </select>
                </div>
            </div>
            <div id="shitt">
            <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-edit"></i> تعديل</button>
            <a href="{{ Route('material.index') }}" id="shit" class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
            </div>
        </form>

    </div>
</div>
@endsection

@push('js')
<!-- Summernote js -->
<script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endpush

