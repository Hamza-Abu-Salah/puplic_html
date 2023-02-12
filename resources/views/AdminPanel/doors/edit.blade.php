@extends('AdminPanel._layout')
@section('title', 'اضافة باب جديد')
@section('subtitle', 'اضافة باب جديد')
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

        <p class="card-title-desc"> * اضافة باب جديد</p>
<hr />
            <form class="custom-validation" action="{{ Route('door.update',$door->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">إسم الباب</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" placeholder="الرجاء اضافة اسم الباب" value="{{ $door->name }}" name="name" id="example-tel-input">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">القانون</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="laws">
                            <option value="">الرجاء اختيار القانون</option>
                            @foreach ($laws as $l)
                                <option {{ $l->id == $door->laws_id ? 'selected' : '' }} value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">الحالة</label>
                <div class="col-sm-6">
                    <select class="form-control" name="status">
                        <option value="">الرجاء اختيار حالة الباب</option>
                        <option {{ $door->status == "1" ? 'selected' : '' }} value="1">فعال</option>
                        <option {{ $door->status == "0" ? 'selected' : '' }}value="0">غير فعال</option>
                    </select>
                </div>
            </div>
            <div id="shitt">
            <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-edit"></i> تعديل</button>
            <a href="{{ Route('door.index') }}" id="shit" class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
            </div>
        </form>

    </div>
</div>
@endsection

