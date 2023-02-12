@extends('AdminPanel._layout')
@section('title', 'تعديل قانون')
@section('subtitle', 'تعديل قانون')
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

        <p class="card-title-desc"> * تعديل القانون (<i style="color: red">{{ $laws->name }}</i>)</p>
<hr />
            <form class="custom-validation" action="{{ Route('laws.update',$laws->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">إسم القانون</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" placeholder="الرجاء اضافة اسم القانون" value="{{ $laws->name }}" name="name" id="example-tel-input">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الحقبة</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="bag">
                            <option value="">الرجاء اختيار حقبة القانون</option>
                            @foreach ($bag as $b)
                                <option {{ $b->id == $laws->bages_id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">الحالة</label>
                <div class="col-sm-6">
                    <select class="form-control" name="status">
                        <option value="">الرجاء اختيار حالة القانون</option>
                        <option {{ $laws->status == 1 ? 'selected' : '' }} value="1">فعال</option>
                        <option {{  $laws->status == 0 ? 'selected' : ''}} value="0">غير فعال</option>
                    </select>
                </div>
            </div>
            <div id="shitt">
            <button type="submit" id="shit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-edit"></i> تعديل</button>
            <a href="{{ Route('laws.index') }}" id="shit" class="btn btn-outline-purple waves-effect waves-light"><i class="fas fa-backward"></i> رجوع</a>
            </div>
        </form>

    </div>
</div>
@endsection

