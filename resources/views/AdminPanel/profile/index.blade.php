@extends('AdminPanel._layout')
@push('css')
    <style>
        .fas {
            margin-left: 10px;
        }
    </style>
@endpush
@section('title', 'الملف الشخصي')
@section('subtitle', 'الملف الشخصي')
@section('content')
        <section class="my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="home-wrapper text-center">
                            <img class="rounded" src="{{Auth::user()->avatar}}" alt="logo" height="30"/>
                            <h3 class="mt-4 font-size-40 text-center">معلومات الملف الشخصي</h3>
                            <br/>

                            <div class="row">
                                <div class="text-center col-md-12">
                                    <div class="card mt-12">
                                        <div class="card-body">
                                            <i class="fas fa-user font-size-32 mb-3"></i>
                                            <h6 class="text-uppercase font-size-20 font-weight-bold mt-3">
                                                </h6>
                                            <p class="text-muted font-size-15 font-weight-bold mt-3">{{Auth::user()->name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-md-12">
                                    <div class="card mt-12">
                                        <div class="card-body">
                                            <i class="fas fa-envelope font-size-32 mb-3"></i>
                                            <h6 class="text-uppercase mt-3 font-size-20 font-weight-bold">
                                                التواصل</h6>

                                            <p class="text-muted mt-3 font-size-10 font-weight-bold disabled"><i class="fas fa-mobile"></i> {{Auth::user()->mobile}} </p>
                                            <p class="text-muted mt-3 font-size-10 font-weight-bold disabled"><i class="fas fa-at"></i> {{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                </div>

                            <div class="text-center col-md-12">
                                <div class="card mt-12">
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary"
                                       id="example-tel-input" style="color: white">تعديل</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
@endsection
